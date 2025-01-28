<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers - AdRetail Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="dashboard-nav">
        <div class="nav-container">
            <div class="logo">AdRetail Pro</div>
            <div class="user-menu">
                <span class="user-name">Joseph Ezeokeke</span>
                <img src="https://ui-avatars.com/api/?name=Joseph+Ezeokeke&background=4F46E5&color=fff&size=40&rounded=true&bold=true" alt="Joseph Ezeokeke" class="profile-img">
                <div class="dropdown-menu">
                    <a href="#profile"><i class="fas fa-user"></i> Profile</a>
                    <a href="#settings"><i class="fas fa-cog"></i> Settings</a>
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
                <li>
                    <a href="orders.html">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="active">
                    <a href="customers.html">
                        <i class="fas fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <li>
                    <a href="settings.html">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-main">
            <section class="dashboard-section">
                <!-- Header -->
                <div class="section-header">
                    <h2>Customers</h2>
                   
                </div>

                <!-- Customer Stats -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-users"></i></div>
                        <div class="stat-content">
                            <h3>Total Customers</h3>
                            <p class="stat-number">2,543</p>
                            <span class="stat-change positive">+15 this month</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-user-check"></i></div>
                        <div class="stat-content">
                            <h3>Active Customers</h3>
                            <p class="stat-number">1,890</p>
                            <span class="stat-text">74% of total</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-crown"></i></div>
                        <div class="stat-content">
                            <h3>VIP Customers</h3>
                            <p class="stat-number">342</p>
                            <span class="stat-text">13% of total</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-money-bill-wave"></i></div>
                        <div class="stat-content">
                            <h3>Avg. Spending</h3>
                            <p class="stat-number">₦45,600</p>
                            <span class="stat-change positive">+8.2% vs last month</span>
                        </div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="filters-section">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search customers...">
                    </div>
                    <div class="filter-group">
                        <select class="filter-select">
                            <option value="">Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="vip">VIP</option>
                        </select>
                        <select class="filter-select">
                            <option value="">Join Date</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="year">This Year</option>
                        </select>
                        <select class="filter-select">
                            <option value="">Spending Range</option>
                            <option value="0-1000">₦0 - ₦1,000</option>
                            <option value="1000-5000">₦1,000 - ₦5,000</option>
                            <option value="5000-20000">₦5,000 - ₦20,000</option>
                            <option value="20000+">₦20,000+</option>
                        </select>
                    </div>
                </div>

                <!-- Customers Table -->
                <div class="table-card">
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">
                                            Customer
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            Status
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            Orders
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            Total Spent
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            Last Order
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="customer-info">
                                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=4F46E5&color=fff&size=28&rounded=true" alt="John Doe" class="customer-avatar">
                                            <div class="customer-details">
                                                <span class="customer-name">John Doe</span>
                                                <span class="customer-email">john.doe@example.com</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge active">
                                            <i class="fas fa-circle"></i>
                                            Active
                                        </span>
                                    </td>
                                    <td>24</td>
                                    <td>₦156,800</td>
                                    <td>2 days ago</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn view-btn" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn edit-btn" title="Edit Customer">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn delete-btn" title="Delete Customer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="customer-info">
                                            <img src="https://ui-avatars.com/api/?name=Sarah+Smith&background=4F46E5&color=fff&size=28&rounded=true" alt="Sarah Smith" class="customer-avatar">
                                            <div class="customer-details">
                                                <span class="customer-name">Sarah Smith</span>
                                                <span class="customer-email">sarah.smith@example.com</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge vip">
                                            <i class="fas fa-circle"></i>
                                            VIP
                                        </span>
                                    </td>
                                    <td>56</td>
                                    <td>₦298,400</td>
                                    <td>5 hours ago</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn view-btn" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn edit-btn" title="Edit Customer">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn delete-btn" title="Delete Customer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="customer-info">
                                            <img src="https://ui-avatars.com/api/?name=Michael+Johnson&background=4F46E5&color=fff&size=28&rounded=true" alt="Michael Johnson" class="customer-avatar">
                                            <div class="customer-details">
                                                <span class="customer-name">Michael Johnson</span>
                                                <span class="customer-email">michael.j@example.com</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge inactive">
                                            <i class="fas fa-circle"></i>
                                            Inactive
                                        </span>
                                    </td>
                                    <td>12</td>
                                    <td>₦45,200</td>
                                    <td>2 weeks ago</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn view-btn" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn edit-btn" title="Edit Customer">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn delete-btn" title="Delete Customer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-container">
                        <div class="pagination-info">Showing 1 to 3 of 2,543 customers</div>
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
