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
                <li>
                    <a href="buyer-dashboard.html">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
           
                <li class="active">
                    <a href="cart.html">
                        <i class="fas fa-shopping-cart"></i>
                        <span>My Cart</span>
                        <span class="cart-count">3</span>
                    </a>
                </li>
                <li>
                    <a href="customer-order.html">
                        <i class="fas fa-box"></i>
                        <span>My Orders</span>
                    </a>
                </li>
                <li>
                    <a href="customer-settings.html">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
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
                        <h2>Cart Items (3)</h2>
                        <button class="btn-text" onclick="clearCart()">
                            <i class="fas fa-trash-alt"></i>
                            Clear Cart
                        </button>
                    </div>

                    <div class="cart-items">
                        <!-- Cart Item 1 -->
                        <div class="cart-item" data-cart-id="1">
                            <div class="item-image">
                                <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=300&q=80" alt="Premium Headphones">
                                <button class="wishlist-btn" title="Add to Wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <div class="item-details">
                                <div class="item-info">
                                    <h3>Premium Headphones</h3>
                                    <p class="item-description">Wireless Noise Cancelling Headphones</p>
                                    <div class="item-meta">
                                        <span class="stock-status in-stock">
                                            <i class="fas fa-check-circle"></i> In Stock
                                        </span>
                                        <span class="delivery-info">
                                            <i class="fas fa-truck"></i> Free Delivery
                                        </span>
                                    </div>
                                </div>
                                <div class="item-actions">
                                    <div class="item-price">
                                        <span class="current-price">₦119,996</span>
                                        <span class="original-price">₦139,996</span>
                                    </div>
                                    <div class="quantity-control">
                                        <button class="quantity-btn decrease">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" value="1" min="1" max="10" class="quantity">
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

                        <!-- Cart Item 2 -->
                        <div class="cart-item" data-cart-id="2">
                            <div class="item-image">
                                <img src="https://images.unsplash.com/photo-1491336477066-31156b5e4f35?w=300&q=80" alt="Smart Watch">
                                <button class="wishlist-btn" title="Add to Wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <div class="item-details">
                                <div class="item-info">
                                    <h3>Smart Watch Pro</h3>
                                    <p class="item-description">Latest Generation Smartwatch with Health Monitoring</p>
                                    <div class="item-meta">
                                        <span class="stock-status in-stock">
                                            <i class="fas fa-check-circle"></i> In Stock
                                        </span>
                                        <span class="delivery-info">
                                            <i class="fas fa-truck"></i> Free Delivery
                                        </span>
                                    </div>
                                </div>
                                <div class="item-actions">
                                    <div class="item-price">
                                        <span class="current-price">₦79,996</span>
                                        <span class="original-price">₦99,996</span>
                                    </div>
                                    <div class="quantity-control">
                                        <button class="quantity-btn decrease">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" value="1" min="1" max="10" class="quantity">
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
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="cart-summary">
                    <div class="summary-card">
                        <h3>Order Summary</h3>
                        <div class="summary-items">
                            <div class="summary-item">
                                <span>Subtotal (3 items)</span>
                                <span>₦199,992</span>
                            </div>
                            <div class="summary-item">
                                <span>Shipping</span>
                                <span class="text-success">Free</span>
                            </div>
                            <div class="summary-item">
                                <span>Tax</span>
                                <span>₦10,000</span>
                            </div>
                            <div class="summary-item discount">
                                <span>Discount Applied</span>
                                <span class="text-success">-₦20,000</span>
                            </div>
                        </div>
                        <div class="summary-total">
                            <span>Total</span>
                            <span class="cart-total">₦189,992</span>
                        </div>
                        <button class="checkout-btn">
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

                    <div class="promo-card">
                        <h4>Have a Promo Code?</h4>
                        <div class="promo-input">
                            <input type="text" placeholder="Enter promo code">
                            <button class="btn-primary">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

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
                    removeCartItem(cartId);
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
                        // Update quantity display
                        document.querySelector(`[data-cart-id="${cartId}"] .quantity`).value = quantity;
                        
                        // Update total price
                        document.querySelector('.cart-total').textContent = 
                            '₦' + new Intl.NumberFormat().format(data.total);
                        
                        // Update cart count in header
                        document.querySelectorAll('.cart-count').forEach(el => {
                            el.textContent = data.cart_count;
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to update quantity. Please try again.');
                });
            }

            function removeCartItem(cartId) {
                if (!confirm('Are you sure you want to remove this item from your cart?')) {
                    return;
                }

                fetch(`/cart/${cartId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove item from DOM
                        document.querySelector(`[data-cart-id="${cartId}"]`).remove();
                        
                        // Update cart count in header
                        document.querySelectorAll('.cart-count').forEach(el => {
                            el.textContent = data.cart_count;
                        });
                        
                        // Refresh page if cart is empty
                        if (data.cart_count === 0) {
                            window.location.reload();
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to remove item. Please try again.');
                });
            }
        });
    </script>
</body>
</html>
