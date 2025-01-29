<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('dashboard.cart', compact('cartItems'));
    }

    public function add(Product $product, Request $request)
    {
        $quantity = $request->input('quantity', 1);
        
        $cartItem = Cart::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'product_id' => $product->id
            ],
            [
                'quantity' => \DB::raw("quantity + $quantity")
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'cart_count' => Cart::where('user_id', auth()->id())->sum('quantity')
        ]);
    }

    public function remove(Cart $cart)
    {
        if ($cart->user_id !== auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $cart->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart',
            'cart_count' => Cart::where('user_id', auth()->id())->sum('quantity')
        ]);
    }

    public function getItems()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        $total = $cartItems->sum(function($item) {
            return $item->product->price * (1 - $item->product->discount/100) * $item->quantity;
        });

        return response()->json([
            'items' => $cartItems,
            'total' => $total
        ]);
    }

    public function updateQuantity(Cart $cart, Request $request)
    {
        if ($cart->user_id !== auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $quantity = $request->input('quantity');
        
        if ($quantity < 1) {
            return response()->json(['success' => false, 'message' => 'Invalid quantity']);
        }

        $cart->update(['quantity' => $quantity]);

        $total = Cart::where('user_id', auth()->id())
            ->with('product')
            ->get()
            ->sum(function($item) {
                return $item->product->price * (1 - $item->product->discount/100) * $item->quantity;
            });

        return response()->json([
            'success' => true,
            'message' => 'Quantity updated',
            'total' => $total
        ]);
    }
}
