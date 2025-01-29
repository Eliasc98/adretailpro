<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function  verifyPayment(Request $request) {   
        $reference = $request->input('res');    
        // Verify payment with Paystack API
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer pk_test_f24eee9b0d2330b8bf2323d218e1177d6fb5ea9f",
                "Cache-Control: no-cache",
            ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
        
        if ($err) {
            return response()->json(['error' => "cURL Error #: $err"]);
        } else {
            $responseData = json_decode($response);
            
            if ($responseData->status && $responseData->data->status === 'success') {
                // Create order from cart
                try {
                    DB::beginTransaction();
                    
                    $cartItems = CartItem::where('user_id', auth()->id())->with('product')->get();
                    
                    // Calculate total amount
                    $totalAmount = $cartItems->sum(function($item) {
                        $itemTotal = $item->quantity * ($item->product->discount > 0 
                            ? $item->product->price * (1 - $item->product->discount / 100)
                            : $item->product->price);
                        return $itemTotal + ($itemTotal * 0.05); // Including 5% tax
                    });

                    // Create order
                    $order = Order::create([
                        'user_id' => auth()->id(),
                        'total_amount' => $totalAmount,
                        'status' => 'paid'
                    ]);

                    // Create order items
                    foreach ($cartItems as $cartItem) {
                        $order->items()->create([
                            'product_id' => $cartItem->product_id,
                            'quantity' => $cartItem->quantity,
                            'price' => $cartItem->product->discount > 0 
                                ? $cartItem->product->price * (1 - $cartItem->product->discount / 100)
                                : $cartItem->product->price
                        ]);
                    }

                    // Clear the cart
                    CartItem::where('user_id', auth()->id())->delete();

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
                        'message' => 'Failed to create order',
                        'error' => $e->getMessage()
                    ], 500);
                }
            }
            
            return response()->json([
                'status' => 'error',
                'message' => 'Payment verification failed',
                'data' => $responseData
            ]);
        }
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
