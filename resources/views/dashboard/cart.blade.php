<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - AdRetail Pro</title>
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
                <span class="user-name">John Doe</span>
                <img src="https://ui-avatars.com/api/?name=John+Doe&background=4F46E5&color=fff&size=40&rounded=true&bold=true" alt="John Doe" class="profile-img">
                <div class="dropdown-menu">
                    <a href="customer-settings.html"><i class="fas fa-user"></i> Profile</a>
                    <a href="customer-settings.html"><i class="fas fa-cog"></i> Settings</a>
                    <a href="login.html"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="dashboard-sidebar">
            <ul class="sidebar-menu">
                <li class="active">
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
                <li>
                    <a href="{{ route('orders') }}">
                        <i class="fas fa-box"></i>
                        <span>My Orders</span>
                    </a>
                </li>
                
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-main">
            <div class="page-header">
                <div class="header-content">
                    <h1>Shopping Cart</h1>
                 
                </div>
                <button class="btn-outline" onclick="window.location.href='buyer-dashboard.html'">
                    <i class="fas fa-arrow-left"></i>
                    Continue Shopping
                </button>
            </div>

            <!-- Cart Content -->
            <div class="cart-container">
                <div class="cart-items-section">
                    <div class="cart-header">
                        <h2>Cart Items ({{ $cartItems->count() }})</h2>
                        <button class="btn-text" onclick="clearCart()">
                            <i class="fas fa-trash-alt"></i>
                            Clear Cart
                        </button>
                    </div>

                    <div class="cart-items">
                        @forelse($cartItems as $cartItem)
                            <div class="cart-item" data-cart-id="{{ $cartItem->id }}">
                                <div class="item-image">
                                    <img src="{{ $cartItem->product->image_url }}" alt="{{ $cartItem->product->name }}">
                                    <button class="wishlist-btn" title="Add to Wishlist">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                                <div class="item-details">
                                    <div class="item-info">
                                        <h3>{{ $cartItem->product->name }}</h3>
                                        <p class="item-description">{{ $cartItem->product->description }}</p>
                                        <div class="item-meta">
                                            <span class="stock-status {{ $cartItem->product->stock > 0 ? 'in-stock' : 'out-of-stock' }}">
                                                <i class="fas {{ $cartItem->product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                                {{ $cartItem->product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                            </span>
                                            <span class="delivery-info">
                                                <i class="fas fa-truck"></i> Free Delivery
                                            </span>
                                        </div>
                                    </div>
                                    <div class="item-actions">
                                        <div class="item-price">
                                            @if($cartItem->product->discount > 0)
                                                <span class="current-price">₦{{ number_format($cartItem->product->price * (1 - $cartItem->product->discount / 100), 2) }}</span>
                                                <span class="original-price">₦{{ number_format($cartItem->product->price, 2) }}</span>
                                            @else
                                                <span class="current-price">₦{{ number_format($cartItem->product->price, 2) }}</span>
                                            @endif
                                        </div>
                                        <div class="quantity-control">
                                            <button class="quantity-btn decrease">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input type="number" value="{{ $cartItem->quantity }}" min="1" max="{{ $cartItem->product->stock }}" class="quantity">
                                            <button class="quantity-btn increase">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <button class="remove-item" title="Remove Item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="cart-item">
                                <div class="item-details">
                                    <div class="item-info">
                                        <h3>Your cart is empty</h3>
                                        <p>Add items to your cart to continue shopping.</p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="cart-summary">
                    <div class="summary-card">
                        <h3>Order Summary</h3>
                        <div class="summary-items">
                            <div class="summary-item">
                                <span>Subtotal ({{ $cartItems->count() }} items)</span>
                                <span>₦{{ number_format($cartItems->sum(function($item) {
                                    return $item->quantity * ($item->product->discount > 0 
                                        ? $item->product->price * (1 - $item->product->discount / 100)
                                        : $item->product->price);
                                }), 2) }}</span>
                            </div>
                            <div class="summary-item">
                                <span>Shipping</span>
                                <span class="text-success">Free</span>
                            </div>
                            <div class="summary-item">
                                <span>Tax</span>
                                <span>₦{{ number_format($cartItems->sum(function($item) {
                                    return $item->quantity * ($item->product->discount > 0 
                                        ? $item->product->price * (1 - $item->product->discount / 100)
                                        : $item->product->price);
                                }) * 0.05, 2) }}</span>
                            </div>
                            @php
                                $totalDiscount = $cartItems->sum(function($item) {
                                    if ($item->product->discount > 0) {
                                        return $item->quantity * ($item->product->price * ($item->product->discount / 100));
                                    }
                                    return 0;
                                });
                            @endphp
                            @if($totalDiscount > 0)
                                <div class="summary-item discount">
                                    <span>Discount Applied</span>
                                    <span class="text-success">-₦{{ number_format($totalDiscount, 2) }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="summary-total">
                            <span>Total</span>
                            <span class="cart-total">₦{{ number_format($cartItems->sum(function($item) {
                                $itemTotal = $item->quantity * ($item->product->discount > 0 
                                    ? $item->product->price * (1 - $item->product->discount / 100)
                                    : $item->product->price);
                                return $itemTotal + ($itemTotal * 0.05); // Adding 5% tax
                            }), 2) }}</span>
                        </div>
                        <button class="checkout-btn" onclick="payWithPaystack({{ number_format($cartItems->sum(function($item) {
                                $itemTotal = $item->quantity * ($item->product->discount > 0 
                                    ? $item->product->price * (1 - $item->product->discount / 100)
                                    : $item->product->price);
                                return $itemTotal + ($itemTotal * 0.05);
                            }), 2) }}, '{{ Auth::user()->email }}')">
                            Proceed to Checkout
                            <i class="fas fa-arrow-right"></i>
                        </button>
                        <div class="secure-checkout">
                            <i class="fas fa-lock"></i>
                            Secure Checkout
                        </div>
                        <div class="payment-methods">
                            <img src="https://cdn-icons-png.flaticon.com/128/349/349221.png" alt="Visa">
                            <img src="https://cdn-icons-png.flaticon.com/128/349/349228.png" alt="Mastercard">
                            <img src="https://assets.paystack.com/assets/img/logos/paystack-logo.png" alt="Paystack">
                            <img src="https://cdn-icons-png.flaticon.com/128/6124/6124998.png" alt="Verve">
                        </div>
                    </div>

                    
                </div>
            </div>
        </main>
    </div>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        function payWithPaystack(amount, email) {
    let handler = PaystackPop.setup({
        key: 'pk_test_f24eee9b0d2330b8bf2323d218e1177d6fb5ea9f',
        email: email,
        amount: amount * 100,
        ref: '' + Math.floor((Math.random() * 1000000000) + 1),
        callback: function(response) {
            fetch("{{ route('verify-payment') }}", {
                method: "POST",  // Change to POST
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Ensure CSRF token is included
                },
                body: JSON.stringify({
                    amount: amount,
                    email: email,
                    res: response.reference
                })
            })
            .then(response => response.json())
            .then(result => {
                if (result.status === 'success') {
                    alert('Payment successful! Your order has been placed.');
                    window.location.href = "{{ route('orders') }}";
                } else {
                    alert(result.message || 'Payment verification failed. Please try again.');
                }
            })
            .catch(error => {
                console.error('Verification error:', error);
                alert('An error occurred while verifying your payment.');
            });
        },
        onClose: function() {
            console.log('Payment window closed');
        }
    });

    handler.openIframe();
}

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update quantity
            document.querySelectorAll('.quantity-control button').forEach(button => {
                button.addEventListener('click', function() {
                    const cartId = this.closest('.cart-item').dataset.cartId;
                    const isIncrease = this.classList.contains('increase');
                    const quantityInput = this.closest('.quantity-control').querySelector('.quantity');
                    let quantity = parseInt(quantityInput.value);

                    if (isIncrease) {
                        quantity++;
                    } else if (quantity > 1) {
                        quantity--;
                    }

                    updateCartQuantity(cartId, quantity);
                });
            });

            // Remove item
            document.querySelectorAll('.remove-item').forEach(button => {
                button.addEventListener('click', function() {
                    const cartId = this.closest('.cart-item').dataset.cartId;
                    if (confirm('Are you sure you want to remove this item from your cart?')) {
                        removeCartItem(cartId);
                    }
                });
            });

            function updateCartQuantity(cartId, quantity) {
                fetch(`/cart/${cartId}/update-quantity`, {
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
                        window.location.reload();
                    } else {
                        alert(data.message || 'Error updating quantity');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to update quantity. Please try again.');
                });
            }

            function removeCartItem(cartId) {
                fetch(`/cart/${cartId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    } else {
                        alert(data.message || 'Error removing item');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to remove item. Please try again.');
                });
            }

            window.clearCart = function() {
                if (confirm('Are you sure you want to clear your cart?')) {
                    fetch('/cart/clear', {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            window.location.reload();
                        } else {
                            alert('Error clearing cart');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to clear cart. Please try again.');
                    });
                }
            }
        });
    </script>
</body>
</html>
