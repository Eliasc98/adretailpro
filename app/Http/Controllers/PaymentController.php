<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function verifyPayment(Request $request) {   
        $reference = $request->input('res');    
        
        // Verify payment with Paystack API
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_test_7f69ca908419138bf54aaf3c24d838b3a126119f",
                "Cache-Control: no-cache",
            ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
        
        if ($err) {
            Log::error('Paystack cURL Error: ' . $err);
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to verify payment'
            ], 500);
        }

        $responseData = json_decode($response);
        
        if (!$responseData) {
            Log::error('Invalid JSON response from Paystack');
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid response from payment provider'
            ], 500);
        }
        
        if ($responseData->status) {
            try {
                DB::beginTransaction();
                
                // Get cart items
                $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
                
                if ($cartItems->isEmpty()) {
                    DB::rollBack();
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Cart is empty'
                    ], 400);
                }

                // Calculate total amount
                $totalAmount = $cartItems->sum(function($item) {
                    $itemTotal = $item->quantity * ($item->product->discount > 0 
                        ? $item->product->price * (1 - $item->product->discount / 100)
                        : $item->product->price);
                    return $itemTotal + ($itemTotal * 0.05); // Including 5% tax
                });

                // Create order
                $order = new Order();
                $order->user_id = Auth::id();
                $order->total_amount = $totalAmount;
                $order->status = 'completed';
                $order->save();

                // Create order items
                foreach ($cartItems as $cartItem) {
                    $price = $cartItem->product->discount > 0 
                        ? $cartItem->product->price * (1 - $cartItem->product->discount / 100)
                        : $cartItem->product->price;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $cartItem->product_id,
                        'quantity' => $cartItem->quantity,
                        'price' => $price
                    ]);
                }

                // Clear the cart
                Cart::where('user_id', Auth::id())->delete();

                DB::commit();
                
                return response()->json([
                    'status' => 'success',
                    'message' => 'Payment verified and order created successfully',
                    'data' => $responseData->data,
                    'order_id' => $order->id
                ]);

            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Order creation failed: ' . $e->getMessage());
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to create order: ' . $e->getMessage()
                ], 500);
            }
        }
        
        return response()->json([
            'status' => 'error',
            'message' => 'Payment verification failed',
            'data' => $responseData
        ], 400);
    }

    public function makePaymentStore(Request $request)
    {
        $admin = auth()->user();
        $payment = Payment::find($request->payment_id);

        DB::beginTransaction();

        try {
            $makepayment = MakePayment::create([
                'admin_id' => $admin->id,
                'payment_id' => $request->payment_id,
                'amount' => $payment->amount,
                'description' => $payment->description,
                'ref' => $request->res
            ]);

            if ($makepayment) {
                DB::commit();
                return response()->json(['status' => 'success', 'message' => 'Payment Made Successfully!'], 200);
            } else {
                DB::rollBack();
                return response()->json(['status' => 'error', 'message' => 'Unable to create payment'], 500);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment creation failed: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'An error occurred while creating payment'], 500);
        }
    }

    public function checkout()
    {
        $cartItems = auth()->user()->cartItems()->with('product')->get();
        $total = $cartItems->sum(function($item) {
            return $item->product->price * (1 - $item->product->discount/100) * $item->quantity;
        });

        return view('checkout', compact('cartItems', 'total'));
    }

    public function initializePayment(Request $request)
    {
        $user = auth()->user();
        $cartItems = $user->cartItems()->with('product')->get();
        $amount = $cartItems->sum(function($item) {
            return $item->product->price * (1 - $item->product->discount/100) * $item->quantity;
        });

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.paystack.secret_key'),
            'Content-Type' => 'application/json',
        ])->post('https://api.paystack.co/transaction/initialize', [
            'email' => $user->email,
            'amount' => $amount * 100, // Convert to kobo
            'callback_url' => route('payment.callback'),
            'metadata' => [
                'cart_items' => $cartItems->map(function($item) {
                    return [
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->product->price * (1 - $item->product->discount/100)
                    ];
                })
            ]
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return redirect($data['data']['authorization_url']);
        }

        return back()->with('error', 'Could not initialize payment. Please try again.');
    }

    public function handleCallback(Request $request)
    {
        $paymentDetails = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.paystack.secret_key'),
        ])->get('https://api.paystack.co/transaction/verify/'.$request->reference);

        if ($paymentDetails->successful() && $paymentDetails['data']['status'] === 'success') {
            // Create order
            $user = auth()->user();
            $cartItems = $user->cartItems()->with('product')->get();
            
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $cartItems->sum(function($item) {
                    return $item->product->price * (1 - $item->product->discount/100) * $item->quantity;
                }),
                'status' => 'paid',
                'payment_reference' => $request->reference
            ]);

            // Create order items and clear cart
            foreach ($cartItems as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price * (1 - $item->product->discount/100)
                ]);

                // Update product stock
                $item->product->decrement('stock', $item->quantity);
            }

            // Clear cart
            $user->cartItems()->delete();

            return redirect()->route('orders')->with('success', 'Payment successful! Your order has been placed.');
        }

        return redirect()->route('checkout')->with('error', 'Payment failed. Please try again.');
    }
}
