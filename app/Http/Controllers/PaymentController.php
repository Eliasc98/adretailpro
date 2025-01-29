<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
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
