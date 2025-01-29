<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - AdRetail Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: #333;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            min-width: 250px;
            background: #fff;
            border-right: 1px solid #eee;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
        }

        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
            background: #f8f9fa;
            min-height: 100vh;
        }

        .nav-container {
            background: #fff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #4F46E5;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }

        .user-name {
            font-weight: 500;
        }

        .profile-img {
            cursor: pointer;
        }

        .content-header {
            margin-bottom: 30px;
        }

        .content-header h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .orders-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
        }

        .order-card {
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .order-info h3 {
            color: #333;
            margin-bottom: 5px;
        }

        .order-date {
            color: #666;
            font-size: 0.9em;
        }

        .order-status {
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: 500;
            text-transform: capitalize;
        }

        .order-status.completed {
            background: #e6f4ea;
            color: #1e7e34;
        }

        .order-items {
            margin-bottom: 20px;
        }

        .order-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .item-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 15px;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
        }

        .item-price {
            color: #666;
        }

        .item-quantity {
            color: #666;
            font-size: 0.9em;
        }

        .order-total {
            text-align: right;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .total-label {
            color: #666;
            margin-right: 10px;
        }

        .total-amount {
            font-size: 1.2em;
            font-weight: 600;
            color: #333;
        }

        .no-orders {
            text-align: center;
            padding: 40px;
        }

        .no-orders i {
            font-size: 48px;
            color: #ccc;
            margin-bottom: 20px;
        }

        .btn-primary {
            background: #4F46E5;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background: #4338ca;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="dashboard-nav">
        <div class="nav-container">
            <div class="logo">AdRetail Pro</div>
            <div class="user-menu">
                <span class="user-name">{{auth()->user()->name}}</span>
                <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}}&background=4F46E5&color=fff&size=40&rounded=true&bold=true" alt="{{auth()->user()->name}}" class="profile-img">
                <div class="dropdown-menu">
                    <a href="{{route('profile.edit')}}"><i class="fas fa-user"></i> Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="dashboard-sidebar">
            <ul class="sidebar-menu">
                <li>
                    <a href="/">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
               
                <li>
                    <a href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span>My Cart</span>
                        <span class="cart-count">({{ $cartItems->count() }})</span>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('orders') }}">
                        <i class="fas fa-box"></i>
                        <span>My Orders</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="content-header">
                <h1>My Orders</h1>
                <p>View and track your orders</p>
            </div>

            <div class="orders-container">
                @if($orders->isEmpty())
                    <div class="no-orders">
                        <i class="fas fa-shopping-bag"></i>
                        <p>You haven't placed any orders yet</p>
                        <a href="/" class="btn-primary">Start Shopping</a>
                    </div>
                @else
                    @foreach($orders as $order)
                        <div class="order-card">
                            <div class="order-header">
                                <div class="order-info">
                                    <h3>Order #{{ $order->id }}</h3>
                                    <span class="order-date">{{ $order->created_at->format('M d, Y') }}</span>
                                </div>
                                <div class="order-status {{ $order->status }}">
                                    {{ ucfirst($order->status) }}
                                </div>
                            </div>
                            <div class="order-items">
                                @foreach($order->items as $item)
                                    <div class="order-item">
                                        <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="item-image">
                                        <div class="item-details">
                                            <div class="item-name">{{ $item->product->name }}</div>
                                            <div class="item-price">₦{{ number_format($item->price, 2) }}</div>
                                            <div class="item-quantity">Quantity: {{ $item->quantity }}</div>
                                        </div>
                                        <div class="item-total">
                                            ₦{{ number_format($item->price * $item->quantity, 2) }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="order-total">
                                <span class="total-label">Total Amount:</span>
                                <span class="total-amount">₦{{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </main>
    </div>

    <script>
        // Toggle user menu
        document.querySelector('.profile-img').addEventListener('click', function() {
            const menu = document.querySelector('.dropdown-menu');
            menu.classList.toggle('active');
        });

        // Mobile sidebar toggle
        document.querySelector('.mobile-menu-btn')?.addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
