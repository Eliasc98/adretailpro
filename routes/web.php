<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Carbon\Carbon;

Route::get('/', function () {
    $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
    return view('index', compact('cartItems'));
});

Route::middleware(['auth'])->group(function () {
    // Dashboard with role-based routing
    Route::get('/dashboard', function () {
        $user = auth()->user();
        
        if ($user->role === 'admin') {
            // Prepare data for seller dashboard
            $totalSales = Order::sum('total_amount');
            $totalOrders = Order::count();
            $recentOrders = Order::with('user')
                ->latest()
                ->take(48)
                ->get();
            $customerFeedback = 4.8;
            
            // Get chart data
            $startDate = Carbon::now()->subDays(6);
            $salesData = Order::where('created_at', '>=', $startDate)
                ->selectRaw('DATE(created_at) as date, COUNT(*) as count, SUM(total_amount) as total')
                ->groupBy('date')
                ->get();

            return view('dashboard.seller-dashboard', compact(
                'totalSales',
                'totalOrders',
                'recentOrders',
                'customerFeedback',
                'salesData'
            ));
        } else {
            // Prepare data for buyer dashboard
            $featuredProducts = Product::where('featured', true)
                ->where('status', 'active')
                ->where('stock', '>', 0)
                ->with('category')
                ->take(3)
                ->get();

            $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
            
            $dealsOfDay = Product::where('status', 'active')
                ->where('discount', '>', 0)
                ->where('stock', '>', 0)
                ->with('category')
                ->orderBy('discount', 'desc')
                ->take(3)
                ->get();

            $limitedOffer = Product::where('status', 'active')
                ->where('discount', '>', 0)
                ->where('stock', '>', 0)
                ->with('category')
                ->orderBy('discount', 'desc')
                ->first();

            return view('dashboard.buyer-dashboard', compact('featuredProducts', 'dealsOfDay', 'limitedOffer', 'cartItems'));
        }
    })->name('dashboard');

    // Products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/search', [ProductController::class, 'search'])->name('search');
    Route::get('/products/featured', [ProductController::class, 'getFeatured'])->name('products.featured');
    Route::get('/products/deals', [ProductController::class, 'getDeals'])->name('products.deals');

    // Cart
    Route::get('/cart', function() {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('dashboard.cart', compact('cartItems'));
    })->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/cart/items', [CartController::class, 'getItems'])->name('cart.items');
    Route::post('/cart/{cart}/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

    // Payment
    Route::get('/checkout-payment', [PaymentController::class, 'verifyPayment'])->name('verify-payment');
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/payment/initialize', [PaymentController::class, 'initializePayment'])->name('payment.initialize');
    Route::get('/payment/callback', [PaymentController::class, 'handleCallback'])->name('payment.callback');

    // Orders
    Route::get('/orders', function () {
        $orders = auth()->user()->orders()->with(['items.product'])->get();
        return view('dashboard.customer-order', compact('orders'));
    })->name('orders');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
