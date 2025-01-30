<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Carbon\Carbon;

Route::get('/', function () {
    $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
    $products = Product::with('category')->latest()->get();
    return view('index', compact('cartItems', 'products'));
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
    Route::prefix('products')->middleware(['auth'])->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/search', [ProductController::class, 'search'])->name('products.search');
        Route::get('/featured', [ProductController::class, 'getFeatured'])->name('products.featured');
        Route::get('/deals', [ProductController::class, 'getDeals'])->name('products.deals');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

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
    Route::post('/verify-payment', [PaymentController::class, 'verifyPayment'])->name('verify-payment');
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/payment/initialize', [PaymentController::class, 'initializePayment'])->name('payment.initialize');
    Route::get('/payment/callback', [PaymentController::class, 'handleCallback'])->name('payment.callback');

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Contact
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

    // Advertisements
    Route::get('/dashboard/advertisements', [AdvertisementController::class, 'index'])->name('dashboard.advertisements');
    Route::get('/dashboard/advertisements/create', [AdvertisementController::class, 'create'])->name('dashboard.advertisements.create');
    Route::post('/dashboard/advertisements', [AdvertisementController::class, 'store'])->name('dashboard.advertisements.store');
    Route::get('/dashboard/advertisements/{advertisement}/edit', [AdvertisementController::class, 'edit'])->name('dashboard.advertisements.edit');
    Route::put('/dashboard/advertisements/{advertisement}', [AdvertisementController::class, 'update'])->name('dashboard.advertisements.update');
    Route::delete('/dashboard/advertisements/{advertisement}', [AdvertisementController::class, 'destroy'])->name('dashboard.advertisements.destroy');

    // Blogs
    Route::get('/dashboard/blogs', [BlogController::class, 'index'])->name('dashboard.blogs');
    Route::get('/dashboard/blogs/create', [BlogController::class, 'create'])->name('dashboard.blogs.create');
    Route::post('/dashboard/blogs', [BlogController::class, 'store'])->name('dashboard.blogs.store');
    Route::get('/dashboard/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('dashboard.blogs.edit');
    Route::put('/dashboard/blogs/{blog}', [BlogController::class, 'update'])->name('dashboard.blogs.update');
    Route::delete('/dashboard/blogs/{blog}', [BlogController::class, 'destroy'])->name('dashboard.blogs.destroy');
});

require __DIR__.'/auth.php';
