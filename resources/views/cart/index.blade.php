<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart - AdRetail Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <ul class="nav-menu">
                        <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li><a href="{{ route('cart.index') }}" class="active"><i class="fas fa-shopping-cart"></i> My Cart <span class="cart-count">0</span></a></li>
                        <li><a href="{{ route('orders') }}"><i class="fas fa-box"></i> My Orders</a></li>
                        <li><a href="{{ route('profile.edit') }}"><i class="fas fa-user"></i> Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="cart-container">
        <h2>My Shopping Cart</h2>
        
        @if($cartItems->count() > 0)
            <div class="cart-items">
                @foreach($cartItems as $item)
                <div class="cart-item" data-item-id="{{ $item->id }}">
                    <img src="{{ $item->product->image ?? 'https://via.placeholder.com/100x100' }}" 
                         alt="{{ $item->product->name }}" class="item-image">
                    <div class="item-details">
                        <h3>{{ $item->product->name }}</h3>
                        <p class="item-price">
                            ₦{{ number_format($item->product->price * (1 - $item->product->discount/100), 2) }}
                            @if($item->product->discount > 0)
                                <span class="original-price">₦{{ number_format($item->product->price, 2) }}</span>
                            @endif
                        </p>
                        <div class="quantity-control">
                            <button class="qty-btn minus" data-item-id="{{ $item->id }}">-</button>
                            <span class="quantity">{{ $item->quantity }}</span>
                            <button class="qty-btn plus" data-item-id="{{ $item->id }}">+</button>
                        </div>
                        <button class="remove-item" data-item-id="{{ $item->id }}">
                            <i class="fas fa-trash"></i> Remove
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="cart-summary">
                <div class="summary-row">
                    <span>Total</span>
                    <span class="total-price">₦{{ number_format($cartItems->sum(function($item) {
                        return $item->product->price * (1 - $item->product->discount/100) * $item->quantity;
                    }), 2) }}</span>
                </div>
                <a href="{{ route('checkout') }}" class="btn btn-primary checkout-button">
                    Proceed to Checkout
                </a>
            </div>
        @else
            <div class="empty-cart">
                <i class="fas fa-shopping-cart fa-3x"></i>
                <p>Your cart is empty</p>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Continue Shopping</a>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update cart count
            function updateCartCount() {
                fetch('{{ route("cart.items") }}')
                    .then(response => response.json())
                    .then(data => {
                        document.querySelectorAll('.cart-count').forEach(el => {
                            el.textContent = data.items.reduce((sum, item) => sum + item.quantity, 0);
                        });
                    });
            }

            // Quantity control
            document.querySelectorAll('.qty-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.dataset.itemId;
                    const isPlus = this.classList.contains('plus');
                    const quantitySpan = this.parentElement.querySelector('.quantity');
                    let quantity = parseInt(quantitySpan.textContent);

                    if (isPlus) {
                        quantity++;
                    } else if (quantity > 1) {
                        quantity--;
                    }

                    fetch(`/cart/${itemId}/update-quantity`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ quantity })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            quantitySpan.textContent = quantity;
                            document.querySelector('.total-price').textContent = 
                                '₦' + new Intl.NumberFormat().format(data.total);
                            updateCartCount();
                        }
                    });
                });
            });

            // Remove item
            document.querySelectorAll('.remove-item').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.dataset.itemId;
                    
                    fetch(`/cart/${itemId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const cartItem = document.querySelector(`.cart-item[data-item-id="${itemId}"]`);
                            cartItem.remove();
                            updateCartCount();
                            
                            // Refresh page if cart is empty
                            if (document.querySelectorAll('.cart-item').length === 0) {
                                window.location.reload();
                            }
                        }
                    });
                });
            });

            // Initial cart count update
            updateCartCount();
        });
    </script>
</body>
</html>
