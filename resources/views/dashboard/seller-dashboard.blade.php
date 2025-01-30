<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard - AdRetail Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Navigation -->
    <nav class="dashboard-nav">
        <div class="nav-container">
            <div class="logo">AdRetail Pro</div>
     
            <div class="user-menu">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4F46E5&color=fff&size=40&rounded=true&bold=true" alt="{{ Auth::user()->name }}" class="profile-img">
                <div class="dropdown-menu">
                    <a href="{{ route('profile.edit') }}"><i class="fas fa-user"></i> Profile</a>
                    <a href="{{ route('profile.edit') }}"><i class="fas fa-cog"></i> Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
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
                <li class="active">
                    <a href="seller-dashboard.html">
                        <i class="fas fa-chart-line"></i>
                        <span>Overview</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('dashboard.advertisements') }}">
                        <i class="fas fa-ad"></i>
                        <span>Manage Ads</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.blogs') }}">
                        <i class="fas fa-blog"></i>
                        <span>Manage Blogs</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.advertisements.create') }}">
                        <i class="fas fa-plus"></i>
                        <span>Create Ad</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.blogs.create') }}">
                        <i class="fas fa-plus"></i>
                        <span>Create Blog</span>
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
                <li>
                    <a href="customers.html">
                        <i class="fas fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>
               
                <a href="settings.html">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-main">
            <!-- Overview Section -->
            <section class="dashboard-section" id="overview">
                <div class="section-header">
                    <h2>Dashboard Overview</h2>
                    <div class="header-actions">
                        <div class="date-filter">
                            <button class="btn btn-outline active">
                                <i class="fas fa-calendar-day"></i> Today
                            </button>
                            <button class="btn btn-outline">
                                <i class="fas fa-calendar-week"></i> Week
                            </button>
                            <button class="btn btn-outline">
                                <i class="fas fa-calendar"></i> Month
                            </button>
                        </div>
                    </div>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-money-bill-wave"></i></div>
                        <div class="stat-content">
                            <h3>Total Sales</h3>
                            <p class="stat-number">₦2,458,900</p>
                            <span class="stat-change positive">+15.2% vs last month</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
                        <div class="stat-content">
                            <h3>Total Orders</h3>
                            <p class="stat-number">1,234</p>
                            <span class="stat-change positive">+8.5% vs last month</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-clock"></i></div>
                        <div class="stat-content">
                            <h3>Recent Orders</h3>
                            <p class="stat-number">48</p>
                            <span class="stat-text">In the last 24 hours</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-star"></i></div>
                        <div class="stat-content">
                            <h3>Customer Feedback</h3>
                            <p class="stat-number">4.8<span class="stat-unit">/5</span></p>
                            <span class="stat-text">Based on 256 reviews</span>
                        </div>
                    </div>
                </div>

                <!-- Top Products Section -->
                <div class="section-header">
                    <h2>Top Products</h2>
                    <div class="header-actions">
                        <button class="btn btn-outline">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        <a href="{{ route('products.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add Product
                        </a>
                    </div>
                </div>
                
                <div class="products-grid">
                    @forelse($topProducts as $product)
                        <div class="product-card">
                            <div class="product-header">
                                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $product->name ?? 'Product' }}" class="product-image">
                                @if(isset($product->stock) && $product->stock <= 10)
                                    <div class="product-status low-stock">Low Stock</div>
                                @elseif(isset($product->sales) && $product->sales > 100)
                                    <div class="product-status bestseller">Bestseller</div>
                                @endif
                            </div>
                            <div class="product-content">
                                <h4>{{ $product->name ?? 'Unnamed Product' }}</h4>
                                <p class="price">₦{{ number_format($product->price ?? 0, 2) }}</p>
                                <div class="product-metrics">
                                    <div class="metric">
                                        <i class="fas fa-chart-line"></i>
                                        <span>{{ $product->sales ?? 0 }} sales</span>
                                    </div>
                                    <div class="metric">
                                        <i class="fas fa-star"></i>
                                        <span>{{ number_format($product->rating ?? 0, 1) }} rating</span>
                                    </div>
                                </div>
                                <div class="product-progress">
                                    <div class="progress-label">
                                        <span>Stock Level</span>
                                        <span>{{ $product->stock_percentage ?? 0 }}%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress" style="width: {{ $product->stock_percentage ?? 0 }}%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-actions">
                                <a href="{{ route('products.edit', $product->id ?? '#') }}" class="btn-icon" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('products.show', $product->id ?? '#') }}" class="btn-icon" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('products.analytics', $product->id ?? '#') }}" class="btn-icon" title="Analytics">
                                    <i class="fas fa-chart-line"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="no-products">
                            <i class="fas fa-box-open"></i>
                            <p>No products available. Add your first product!</p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Product
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- Recent Sales Section -->
                <div class="section-header mt-4">
                    <h2>Recent Sales</h2>
                    <div class="header-actions">
                        <button class="btn btn-outline">
                            <i class="fas fa-download"></i> Export
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-eye"></i> View All Sales
                        </button>
                    </div>
                </div>
                
                <div class="recent-sales">
                    <div class="sales-table-container">
                        <table class="sales-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Product</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ORD-2501</td>
                                    <td>
                                        <div class="customer-info">
                                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=4F46E5&color=fff&size=32&rounded=true" alt="John Doe" class="customer-avatar">
                                            <span>John Doe</span>
                                        </div>
                                    </td>
                                    <td>Premium Watch</td>
                                    <td>Jan 28, 2025</td>
                                    <td class="amount">₦29,000</td>
                                    <td><span class="status-badge completed">Completed</span></td>
                                    <td>
                                        <div class="table-actions">
                                            <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                                            <button class="btn-icon" title="Download Invoice"><i class="fas fa-file-invoice"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-2500</td>
                                    <td>
                                        <div class="customer-info">
                                            <img src="https://ui-avatars.com/api/?name=Sarah+Smith&background=4F46E5&color=fff&size=32&rounded=true" alt="Sarah Smith" class="customer-avatar">
                                            <span>Sarah Smith</span>
                                        </div>
                                    </td>
                                    <td>Wireless Headphones</td>
                                    <td>Jan 28, 2025</td>
                                    <td class="amount">₦19,000</td>
                                    <td><span class="status-badge processing">Processing</span></td>
                                    <td>
                                        <div class="table-actions">
                                            <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                                            <button class="btn-icon" title="Download Invoice"><i class="fas fa-file-invoice"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-2499</td>
                                    <td>
                                        <div class="customer-info">
                                            <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=4F46E5&color=fff&size=32&rounded=true" alt="Mike Johnson" class="customer-avatar">
                                            <span>Mike Johnson</span>
                                        </div>
                                    </td>
                                    <td>Smart Watch</td>
                                    <td>Jan 27, 2025</td>
                                    <td class="amount">₦45,000</td>
                                    <td><span class="status-badge completed">Completed</span></td>
                                    <td>
                                        <div class="table-actions">
                                            <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                                            <button class="btn-icon" title="Download Invoice"><i class="fas fa-file-invoice"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-2498</td>
                                    <td>
                                        <div class="customer-info">
                                            <img src="https://ui-avatars.com/api/?name=Emma+Wilson&background=4F46E5&color=fff&size=32&rounded=true" alt="Emma Wilson" class="customer-avatar">
                                            <span>Emma Wilson</span>
                                        </div>
                                    </td>
                                    <td>Bluetooth Speaker</td>
                                    <td>Jan 27, 2025</td>
                                    <td class="amount">₦15,000</td>
                                    <td><span class="status-badge pending">Pending</span></td>
                                    <td>
                                        <div class="table-actions">
                                            <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                                            <button class="btn-icon" title="Download Invoice"><i class="fas fa-file-invoice"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-2497</td>
                                    <td>
                                        <div class="customer-info">
                                            <img src="https://ui-avatars.com/api/?name=David+Brown&background=4F46E5&color=fff&size=32&rounded=true" alt="David Brown" class="customer-avatar">
                                            <span>David Brown</span>
                                        </div>
                                    </td>
                                    <td>Gaming Mouse</td>
                                    <td>Jan 27, 2025</td>
                                    <td class="amount">₦12,000</td>
                                    <td><span class="status-badge completed">Completed</span></td>
                                    <td>
                                        <div class="table-actions">
                                            <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                                            <button class="btn-icon" title="Download Invoice"><i class="fas fa-file-invoice"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Sales Analytics Chart -->
                <div class="section-header">
                    <h2>Sales Analytics</h2>
                    <div class="header-actions">
                        <select class="select-outline">
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="viewsChart"></canvas>
                </div>
            </section>

            <!-- Audience Insights Section -->
            <section class="dashboard-section" id="audience">
                <h2>Audience Insights</h2>
                
                <!-- Audience Overview Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-users"></i></div>
                        <div class="stat-content">
                            <h3>Total Audience</h3>
                            <p class="stat-number">45,678</p>
                            <span class="stat-change positive">+15.3%</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-venus-mars"></i></div>
                        <div class="stat-content">
                            <h3>Gender Split</h3>
                            <p class="stat-number">54% F / 46% M</p>
                            <span class="stat-change neutral">Balanced</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-globe"></i></div>
                        <div class="stat-content">
                            <h3>Top Location</h3>
                            <p class="stat-number">Lagos, NG</p>
                            <span class="stat-change positive">+5.2%</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-clock"></i></div>
                        <div class="stat-content">
                            <h3>Peak Hours</h3>
                            <p class="stat-number">2PM - 6PM</p>
                            <span class="stat-change neutral">Consistent</span>
                        </div>
                    </div>
                </div>

                <!-- Detailed Insights -->
                <div class="audience-insights">
                    <!-- Demographics -->
                    <div class="insight-card">
                        <h3>Demographics</h3>
                        <div class="chart-container">
                            <canvas id="demographicsChart"></canvas>
                        </div>
                        <div class="insight-legend">
                            <div class="legend-item">
                                <span class="dot age-18-24"></span>
                                <span>18-24 (35%)</span>
                            </div>
                            <div class="legend-item">
                                <span class="dot age-25-34"></span>
                                <span>25-34 (42%)</span>
                            </div>
                            <div class="legend-item">
                                <span class="dot age-35-44"></span>
                                <span>35-44 (15%)</span>
                            </div>
                            <div class="legend-item">
                                <span class="dot age-45-plus"></span>
                                <span>45+ (8%)</span>
                            </div>
                        </div>
                    </div>

                  

                    <!-- Location Map -->
                    <div class="insight-card">
                        <h3>Geographic Distribution</h3>
                        <div class="location-stats">
                            <div class="location-list">
                                <div class="location-item">
                                    <span class="location-name">Lagos</span>
                                    <div class="location-bar">
                                        <div class="bar-fill" style="width: 75%"></div>
                                    </div>
                                    <span class="location-percent">75%</span>
                                </div>
                                <div class="location-item">
                                    <span class="location-name">Abuja</span>
                                    <div class="location-bar">
                                        <div class="bar-fill" style="width: 45%"></div>
                                    </div>
                                    <span class="location-percent">45%</span>
                                </div>
                                <div class="location-item">
                                    <span class="location-name">Port Harcourt</span>
                                    <div class="location-bar">
                                        <div class="bar-fill" style="width: 35%"></div>
                                    </div>
                                    <span class="location-percent">35%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Engagement Times -->
                    <div class="insight-card">
                        <h3>Peak Engagement Times</h3>
                        <div class="chart-container">
                            <canvas id="engagementChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Audience Targeting Recommendations -->
                <div class="targeting-recommendations">
                    <h3>Targeting Recommendations</h3>
                    <div class="recommendations-grid">
                        <div class="recommendation-card">
                            <div class="recommendation-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <div class="recommendation-content">
                                <h4>Best Performing Audience</h4>
                                <p>Women, 25-34, interested in fashion and technology</p>
                                <button class="target-btn">Target This Segment</button>
                            </div>
                        </div>
                        <div class="recommendation-card">
                            <div class="recommendation-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="recommendation-content">
                                <h4>Optimal Posting Times</h4>
                                <p>Weekdays 2PM - 6PM, Weekends 11AM - 3PM</p>
                                <button class="schedule-btn">Schedule Posts</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Top Customers Section -->
            <section class="dashboard-section" id="customers">
                <h2>Top Customers</h2>

                <div class="customers-grid">
                    <div class="customer-card top-customer">
                        <div class="customer-rank">1</div>
                        <img src="https://ui-avatars.com/api/?name=John+Doe&size=64&background=4F46E5&color=fff" alt="Top Customer">
                        <h3>John Doe</h3>
                        <p class="customer-stats">
                            <span><i class="fas fa-shopping-cart"></i> 45 Orders</span>
                            <span><i class="fas fa-naira-sign"></i> ₦450,000</span>
                        </p>
                        <div class="customer-badges">
                            <span class="badge vip">VIP</span>
                            <span class="badge loyal">Loyal</span>
                        </div>
                    </div>

                    <div class="customer-card">
                        <div class="customer-rank">2</div>
                        <img src="https://ui-avatars.com/api/?name=Jane+Smith&size=64&background=7C3AED&color=fff" alt="Customer">
                        <h3>Jane Smith</h3>
                        <p class="customer-stats">
                            <span><i class="fas fa-shopping-cart"></i> 38 Orders</span>
                            <span><i class="fas fa-naira-sign"></i> ₦380,000</span>
                        </p>
                        <div class="customer-badges">
                            <span class="badge loyal">Loyal</span>
                        </div>
                    </div>
                </div>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Total Orders</th>
                                <th>Total Spent</th>
                                <th>Last Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="customer-cell">
                                        <img src="https://ui-avatars.com/api/?name=John+Doe&size=32&background=4F46E5&color=fff" alt="Customer">
                                        <div class="customer-info">
                                            <span class="customer-name">John Doe</span>
                                            <span class="customer-email">john@example.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>45</td>
                                <td>₦450,000</td>
                                <td>Jan 27, 2025</td>
                                <td><span class="status-badge success">VIP</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="view-btn"><i class="fas fa-eye"></i></button>
                                        <button class="message-btn"><i class="fas fa-envelope"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            
    

            
        </main>
    </div>

    <script>
        // Initialize Charts
        const ctx = document.getElementById('viewsChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Ad Views',
                    data: [1200, 1900, 3000, 5000, 4000, 3000],
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Ad Performance Over Time'
                    }
                }
            }
        });

        // Demographics Chart
        const demographicsCtx = document.getElementById('demographicsChart').getContext('2d');
        new Chart(demographicsCtx, {
            type: 'doughnut',
            data: {
                labels: ['18-24', '25-34', '35-44', '45+'],
                datasets: [{
                    data: [35, 42, 15, 8],
                    backgroundColor: [
                        '#4F46E5',
                        '#7C3AED',
                        '#EC4899',
                        '#F59E0B'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Engagement Times Chart
        const engagementCtx = document.getElementById('engagementChart').getContext('2d');
        new Chart(engagementCtx, {
            type: 'bar',
            data: {
                labels: ['6AM', '9AM', '12PM', '3PM', '6PM', '9PM'],
                datasets: [{
                    label: 'Engagement Rate',
                    data: [20, 45, 60, 85, 75, 40],
                    backgroundColor: 'rgba(79, 70, 229, 0.2)',
                    borderColor: 'rgb(79, 70, 229)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

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

        // File upload preview
        document.getElementById('ad-media').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if (fileName) {
                document.querySelector('.upload-label span').textContent = fileName;
            }
        });
    </script>
</body>
</html>
