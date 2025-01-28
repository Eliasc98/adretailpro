<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - AdRetail Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
              
                <li>
                    <a href="cart.html">
                        <i class="fas fa-shopping-cart"></i>
                        <span>My Cart</span>
                        <span class="cart-count">3</span>
                    </a>
                </li>
                <li class="active">
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
            <!-- Order Stats -->
            <div class="order-stats">
                <div class="stat-card">
                    <div class="stat-icon processing">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-info">
                        <span class="stat-label">Processing</span>
                        <span class="stat-value">2</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon shipped">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="stat-info">
                        <span class="stat-label">Shipped</span>
                        <span class="stat-value">1</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon delivered">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-info">
                        <span class="stat-label">Delivered</span>
                        <span class="stat-value">15</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon total">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="stat-info">
                        <span class="stat-label">Total Orders</span>
                        <span class="stat-value">18</span>
                    </div>
                </div>
            </div>

            <div class="page-header">
                <div class="header-content">
                    <h1>My Orders</h1>
                    <p class="text-muted">Track and manage your orders</p>
                </div>
                <div class="order-filters">
                    <div class="search-orders">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search by order ID or product name..." class="search-input">
                    </div>
                    <div class="filter-group">
                        <select class="filter-select">
                            <option value="all">All Orders</option>
                            <option value="processing">Processing</option>
                            <option value="shipped">Shipped</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <select class="filter-select">
                            <option value="recent">Most Recent</option>
                            <option value="oldest">Oldest First</option>
                            <option value="highest">Highest Amount</option>
                            <option value="lowest">Lowest Amount</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Orders List -->
            <div class="orders-container">
                <!-- Order Item -->
                <div class="order-card">
                    <div class="order-header">
                        <div class="order-info">
                            <div class="order-id-group">
                                <span class="order-id">Order #ORD-2025-001</span>
                                <button class="btn-copy" title="Copy Order ID">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                            <div class="order-meta">
                                <span class="order-date"><i class="far fa-calendar"></i> January 28, 2025</span>
                                <span class="order-time"><i class="far fa-clock"></i> 10:30 AM</span>
                            </div>
                        </div>
                        <div class="order-status processing">
                            <i class="fas fa-clock"></i>
                            Processing
                        </div>
                    </div>
                    <div class="order-progress">
                        <div class="progress-step completed">
                            <i class="fas fa-check"></i>
                            <span>Order Placed</span>
                        </div>
                        <div class="progress-line active"></div>
                        <div class="progress-step active">
                            <i class="fas fa-cog"></i>
                            <span>Processing</span>
                        </div>
                        <div class="progress-line"></div>
                        <div class="progress-step">
                            <i class="fas fa-truck"></i>
                            <span>Shipped</span>
                        </div>
                        <div class="progress-line"></div>
                        <div class="progress-step">
                            <i class="fas fa-home"></i>
                            <span>Delivered</span>
                        </div>
                    </div>
                    <div class="order-items">
                        <div class="order-item">
                            <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=300&q=80" alt="Premium Headphones">
                            <div class="item-details">
                                <h3>Premium Headphones</h3>
                                <div class="item-meta-group">
                                    <span class="item-meta"><i class="fas fa-box"></i> Quantity: 1</span>
                                    <span class="item-meta"><i class="fas fa-palette"></i> Color: Black</span>
                                    <span class="item-meta"><i class="fas fa-tag"></i> SKU: HDX-100</span>
                                </div>
                                <div class="item-price-group">
                                    <span class="item-price">₦119,996</span>
                                    <span class="price-saved">Saved ₦20,000</span>
                                </div>
                            </div>
                            <div class="item-actions">
                                <button class="btn-outline btn-sm">
                                    <i class="fas fa-redo"></i>
                                    Buy Again
                                </button>
                                <button class="btn-text btn-sm">
                                    <i class="fas fa-star"></i>
                                    Rate Product
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="order-details">
                        <div class="detail-group">
                            <h4>Shipping Address</h4>
                            <p>123 Main Street, Apartment 4B</p>
                            <p>Lagos, Nigeria</p>
                            <p>Phone: +234 123 456 7890</p>
                        </div>
                        <div class="detail-group">
                            <h4>Payment Details</h4>
                            <p><i class="fab fa-cc-mastercard"></i> Card ending in 4242</p>
                            <p>Transaction ID: TXN123456789</p>
                        </div>
                    </div>
                    <div class="order-footer">
                        <div class="order-summary">
                            <div class="summary-row">
                                <span>Subtotal:</span>
                                <span>₦119,996</span>
                            </div>
                            <div class="summary-row">
                                <span>Shipping:</span>
                                <span class="text-success">Free</span>
                            </div>
                            <div class="summary-row">
                                <span>Discount:</span>
                                <span class="text-success">-₦20,000</span>
                            </div>
                            <div class="summary-row total">
                                <span>Total:</span>
                                <span>₦99,996</span>
                            </div>
                        </div>
                        <div class="order-actions">
                            <button class="btn-outline">
                                <i class="fas fa-headset"></i>
                                Need Help?
                            </button>
                            <button class="btn-outline">
                                <i class="fas fa-file-alt"></i>
                                View Invoice
                            </button>
                            <button class="btn-primary">
                                <i class="fas fa-truck"></i>
                                Track Order
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Similar order cards can be added here -->
            </div>
        </main>
    </div>

    <script>
        // Initialize dropdown menu
        document.querySelector('.profile-img').addEventListener('click', function() {
            document.querySelector('.dropdown-menu').classList.toggle('show');
        });

        // Copy Order ID
        document.querySelectorAll('.btn-copy').forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.closest('.order-id-group').querySelector('.order-id').textContent;
                navigator.clipboard.writeText(orderId).then(() => {
                    // Show success tooltip
                    button.setAttribute('title', 'Copied!');
                    setTimeout(() => button.setAttribute('title', 'Copy Order ID'), 2000);
                });
            });
        });

        // Filter orders
        document.querySelectorAll('.filter-select').forEach(select => {
            select.addEventListener('change', function() {
                console.log('Filtering orders by:', this.value);
                // Add filter logic here
            });
        });

        // Search orders
        document.querySelector('.search-input').addEventListener('input', function() {
            console.log('Searching orders:', this.value);
            // Add search logic here
        });
    </script>
</body>
</html>
