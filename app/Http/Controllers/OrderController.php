<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with(['items.product'])
            ->orderBy('created_at', 'desc')
            ->get();

            $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        return view('dashboard.customer-order', compact('orders','cartItems'));
    }
}
