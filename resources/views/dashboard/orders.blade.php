<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - AdRetail Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="dashboard-nav">
        <div class="nav-container">
            <div class="logo">AdRetail Pro</div>
            <div class="user-menu">
                <span class="user-name">{{auth()->user()->name}}</span>
                <img src="https://ui-avatars.com/api/?name=Joseph+Ezeokeke&background=4F46E5&color=fff&size=40&rounded=true&bold=true" alt="Joseph Ezeokeke" class="profile-img">
                <div class="dropdown-menu">
                    <a href="settings.html?tab=general#profile"><i class="fas fa-user"></i> Profile</a>
                    <a href="settings.html?tab=general"><i class="fas fa-cog"></i> Settings</a>
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
                    <a href="seller-dashboard.html">
                        <i class="fas fa-chart-line"></i>
                        <span>Overview</span>
                    </a>
                </li>
                <li>
                    <a href="manage-ad.html">
                        <i class="fas fa-ad"></i>
                        <span>Manage Ads</span>
                    </a>
                </li>
                <li>
                    <a href="analytics.html">
                        <i class="fas fa-chart-bar"></i>
                        <span>Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="products.html">
                        <i class="fas fa-box"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="active">
                    <a href="orders.html">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="customers.html">
                        <i class="fas fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>
                
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-main">
            <section class="dashboard-section">
                <!-- Header -->
                <div class="section-header">
                    <h2>Orders</h2>
                
                </div>

                <!-- Order Stats -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-shopping-bag"></i></div>
                        <div class="stat-content">
                            <h3>Total Orders</h3>
                            <p class="stat-number">1,234</p>
                            <span class="stat-change positive">+8.5% vs last month</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-clock"></i></div>
                        <div class="stat-content">
                            <h3>Pending Orders</h3>
                            <p class="stat-number">48</p>
                            <span class="stat-text">Needs attention</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-truck"></i></div>
                        <div class="stat-content">
                            <h3>Delivered</h3>
                            <p class="stat-number">892</p>
                            <span class="stat-change positive">+12.3% this week</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-money-bill-wave"></i></div>
                        <div class="stat-content">
                            <h3>Total Revenue</h3>
                            <p class="stat-number">₦2,458,900</p>
                            <span class="stat-change positive">+15.2% vs last month</span>
                        </div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="filters-section">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search orders...">
                    </div>
                    <div class="filter-group">
                        <select class="filter-select">
                            <option value="">Status</option>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="shipped">Shipped</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <select class="filter-select">
                            <option value="">Payment Status</option>
                            <option value="paid">Paid</option>
                            <option value="unpaid">Unpaid</option>
                            <option value="refunded">Refunded</option>
                        </select>
                        <select class="filter-select">
                            <option value="">Time Period</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                </div>

                <!-- Orders Table -->
                <div class="table-card">
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">
                                            Order ID
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            Customer
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            Products
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            Total
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            Status
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ORD-2501</td>
                                    <td>
                                        <div class="customer-info">
                                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=4F46E5&color=fff&size=28&rounded=true" alt="John Doe" class="customer-avatar">
                                            <div class="customer-details">
                                                <span class="customer-name">John Doe</span>
                                                <span class="customer-email">john@example.com</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-list">
                                            <span class="product-item">Premium Watch</span>
                                            <span class="product-item">Wireless Headphones</span>
                                        </div>
                                    </td>
                                    <td>₦48,000</td>
                                    <td><span class="status-badge processing">Processing</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                                            <button class="btn-icon" title="Edit Order"><i class="fas fa-edit"></i></button>
                                            <button class="btn-icon" title="Delete Order"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-2502</td>
                                    <td>
                                        <div class="customer-info">
                                            <img src="https://ui-avatars.com/api/?name=Sarah+Smith&background=4F46E5&color=fff&size=28&rounded=true" alt="Sarah Smith" class="customer-avatar">
                                            <div class="customer-details">
                                                <span class="customer-name">Sarah Smith</span>
                                                <span class="customer-email">sarah@example.com</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-list">
                                            <span class="product-item">Running Shoes</span>
                                        </div>
                                    </td>
                                    <td>₦15,000</td>
                                    <td><span class="status-badge delivered">Delivered</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                                            <button class="btn-icon" title="Edit Order"><i class="fas fa-edit"></i></button>
                                            <button class="btn-icon" title="Delete Order"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-2503</td>
                                    <td>
                                        <div class="customer-info">
                                            <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=4F46E5&color=fff&size=28&rounded=true" alt="Mike Johnson" class="customer-avatar">
                                            <div class="customer-details">
                                                <span class="customer-name">Mike Johnson</span>
                                                <span class="customer-email">mike@example.com</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-list">
                                            <span class="product-item">Smart Watch Pro</span>
                                            <span class="product-item">+2 more</span>
                                        </div>
                                    </td>
                                    <td>₦35,000</td>
                                    <td><span class="status-badge pending">Pending</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                                            <button class="btn-icon" title="Edit Order"><i class="fas fa-edit"></i></button>
                                            <button class="btn-icon" title="Delete Order"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-container">
                        <div class="pagination-info">Showing 1 to 3 of 24 orders</div>
                        <div class="pagination">
                            <button class="btn btn-icon" disabled><i class="fas fa-chevron-left"></i></button>
                            <button class="btn btn-icon active">1</button>
                            <button class="btn btn-icon">2</button>
                            <button class="btn btn-icon">3</button>
                            <button class="btn btn-icon"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Toggle user menu
        document.querySelector('.profile-img').addEventListener('click', function() {
            document.querySelector('.dropdown-menu').classList.toggle('show');
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            if (!e.target.matches('.profile-img')) {
                const dropdown = document.querySelector('.dropdown-menu');
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            }
        });
    </script>
</body>
</html>
