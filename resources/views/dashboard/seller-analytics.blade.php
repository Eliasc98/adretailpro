<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics - AdRetail Pro</title>
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
                <span class="user-name">Joseph Ezeokeke</span>
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
                <li class="active">
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
            <!-- Header Section -->
            <section class="dashboard-section">
                <div class="section-header with-breadcrumb">
                    <div class="header-content">
                     
                        <h2>Campaign Analytics</h2>
                        <p class="section-description">Track and analyze your advertising performance metrics</p>
                    </div>
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
                        <button class="btn btn-primary">
                            <i class="fas fa-download"></i> Export Report
                        </button>
                    </div>
                </div>

                <!-- Performance Summary -->
                <div class="performance-summary">
                    <div class="summary-header">
                        <h3>Performance Overview</h3>
                        <span class="date-range">Jan 20 - Jan 27, 2025</span>
                    </div>
                    <div class="metrics-grid">
                        <div class="metric-card">
                            <div class="metric-icon" style="background: rgba(79, 70, 229, 0.1);">
                                <i class="fas fa-eye" style="color: #4F46E5;"></i>
                            </div>
                            <div class="metric-content">
                                <h3>Total Impressions</h3>
                                <p class="metric-value">1.2M</p>
                                <div class="metric-details">
                                    <span class="metric-change positive">
                                        <i class="fas fa-arrow-up"></i> 12.5%
                                    </span>
                                    <span class="metric-period">vs last period</span>
                                </div>
                            </div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-icon" style="background: rgba(16, 185, 129, 0.1);">
                                <i class="fas fa-mouse-pointer" style="color: #10B981;"></i>
                            </div>
                            <div class="metric-content">
                                <h3>Click-through Rate</h3>
                                <p class="metric-value">3.8%</p>
                                <div class="metric-details">
                                    <span class="metric-change positive">
                                        <i class="fas fa-arrow-up"></i> 2.1%
                                    </span>
                                    <span class="metric-period">vs last period</span>
                                </div>
                            </div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-icon" style="background: rgba(245, 158, 11, 0.1);">
                                <i class="fas fa-shopping-cart" style="color: #F59E0B;"></i>
                            </div>
                            <div class="metric-content">
                                <h3>Conversions</h3>
                                <p class="metric-value">45.2K</p>
                                <div class="metric-details">
                                    <span class="metric-change negative">
                                        <i class="fas fa-arrow-down"></i> 3.2%
                                    </span>
                                    <span class="metric-period">vs last period</span>
                                </div>
                            </div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-icon" style="background: rgba(239, 68, 68, 0.1);">
                                <i class="fas fa-dollar-sign" style="color: #EF4444;"></i>
                            </div>
                            <div class="metric-content">
                                <h3>Ad Spend</h3>
                                <p class="metric-value">₦825.4K</p>
                                <div class="metric-details">
                                    <span class="metric-change neutral">
                                        <i class="fas fa-minus"></i> 0.0%
                                    </span>
                                    <span class="metric-period">vs last period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="charts-section">
                    <div class="chart-card">
                        <div class="chart-header">
                            <div class="chart-title">
                                <h3>Campaign Performance</h3>
                                <span class="chart-subtitle">Daily trend of impressions and clicks</span>
                            </div>
                            <div class="chart-actions">
                                <div class="chart-legend">
                                    <span class="legend-item">
                                        <span class="legend-color" style="background: #4F46E5;"></span>
                                        Impressions
                                    </span>
                                    <span class="legend-item">
                                        <span class="legend-color" style="background: #10B981;"></span>
                                        Clicks
                                    </span>
                                </div>
                                <div class="chart-buttons">
                                    <button class="btn btn-icon" title="Download Chart">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="btn btn-icon" title="More Options">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="performanceChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <div class="chart-title">
                                <h3>Audience Demographics</h3>
                                <span class="chart-subtitle">Age distribution of engaged users</span>
                            </div>
                            <div class="chart-actions">
                                <button class="btn btn-icon" title="Download Chart">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button class="btn btn-icon" title="More Options">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="demographicsChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Campaign Performance Table -->
                <div class="table-card">
                    <div class="table-header">
                        <div class="table-title">
                            <h3>Campaign Performance</h3>
                            <span class="table-subtitle">Detailed metrics for all active campaigns</span>
                        </div>
                        <div class="table-actions">
                            <div class="search-box">
                                <i class="fas fa-search"></i>
                                <input type="text" placeholder="Search campaigns...">
                            </div>
                            <button class="btn btn-outline">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                            <button class="btn btn-outline">
                                <i class="fas fa-download"></i> Export
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="th-content">
                                            Campaign
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            Type
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            Impressions
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            Clicks
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            CTR
                                            <i class="fas fa-sort"></i>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="th-content">
                                            Cost/Conv.
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
                                    <td>
                                        <div class="campaign-info">
                                            <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?w=150&auto=format&fit=crop&q=80" alt="Summer Collection Campaign" class="campaign-image">
                                            <div class="campaign-details">
                                                <span class="campaign-name">Summer Collection</span>
                                                <span class="campaign-date">Started Jan 20, 2025</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-image">Image</span></td>
                                    <td>458.2K</td>
                                    <td>25.4K</td>
                                    <td><span class="metric-value positive">5.54%</span></td>
                                    <td>₦125.00</td>
                                    <td><span class="status-badge active">Active</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-icon" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-icon" title="Edit Campaign">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-icon" title="More Options">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- More rows can be added here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="table-footer">
                        <div class="table-info">Showing 1 to 10 of 45 entries</div>
                        <div class="pagination">
                            <button class="btn btn-icon" disabled>
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="btn btn-icon active">1</button>
                            <button class="btn btn-icon">2</button>
                            <button class="btn btn-icon">3</button>
                            <span class="pagination-ellipsis">...</span>
                            <button class="btn btn-icon">5</button>
                            <button class="btn btn-icon">
                                <i class="fas fa-chevron-right"></i>
                            </button>
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

        // Check table overflow
        function checkTableOverflow() {
            const tableWrapper = document.querySelector('.table-responsive');
            if (tableWrapper.scrollWidth > tableWrapper.clientWidth) {
                tableWrapper.classList.add('has-overflow');
            } else {
                tableWrapper.classList.remove('has-overflow');
            }
        }

        // Initialize and handle responsive charts
        function initializeCharts() {
            // Performance Chart
            const performanceCtx = document.getElementById('performanceChart').getContext('2d');
            const performanceChart = new Chart(performanceCtx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Impressions',
                        data: [150000, 175000, 165000, 180000, 190000, 185000, 195000],
                        borderColor: '#4F46E5',
                        tension: 0.4,
                        fill: false
                    }, {
                        label: 'Clicks',
                        data: [5000, 6000, 5500, 6500, 7000, 6800, 7200],
                        borderColor: '#10B981',
                        tension: 0.4,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: window.innerWidth < 768 ? 'bottom' : 'top',
                            labels: {
                                boxWidth: 12,
                                padding: window.innerWidth < 768 ? 10 : 20
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                maxTicksLimit: window.innerWidth < 768 ? 5 : 8
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                maxRotation: window.innerWidth < 768 ? 45 : 0
                            }
                        }
                    }
                }
            });

            // Demographics Chart
            const demographicsCtx = document.getElementById('demographicsChart').getContext('2d');
            const demographicsChart = new Chart(demographicsCtx, {
                type: 'doughnut',
                data: {
                    labels: ['18-24', '25-34', '35-44', '45-54', '55+'],
                    datasets: [{
                        data: [25, 35, 20, 15, 5],
                        backgroundColor: [
                            '#4F46E5',
                            '#10B981',
                            '#F59E0B',
                            '#EF4444',
                            '#6B7280'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: window.innerWidth < 768 ? 'bottom' : 'right',
                            labels: {
                                boxWidth: 12,
                                padding: window.innerWidth < 768 ? 10 : 20
                            }
                        }
                    }
                }
            });

            // Store chart instances for resize handling
            window.charts = {
                performance: performanceChart,
                demographics: demographicsChart
            };
        }

        // Handle window resize
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                // Update chart layouts
                if (window.charts) {
                    Object.values(window.charts).forEach(chart => {
                        if (chart.options.plugins.legend) {
                            chart.options.plugins.legend.position = 
                                window.innerWidth < 768 ? 'bottom' : 
                                chart.config.type === 'doughnut' ? 'right' : 'top';
                        }
                        chart.update();
                    });
                }
                // Check table overflow
                checkTableOverflow();
            }, 250);
        });

        // Date filter buttons
        document.querySelectorAll('.date-filter .btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.date-filter .btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            initializeCharts();
            checkTableOverflow();
            
            // Add loading simulation
            document.querySelectorAll('.chart-card').forEach(card => {
                card.classList.add('loading');
                setTimeout(() => {
                    card.classList.remove('loading');
                }, 1000);
            });
        });

        // Handle chart download
        document.querySelectorAll('.chart-actions .fa-download').forEach(btn => {
            btn.parentElement.addEventListener('click', function(e) {
                e.preventDefault();
                const chartCanvas = this.closest('.chart-card').querySelector('canvas');
                const link = document.createElement('a');
                link.download = 'chart.png';
                link.href = chartCanvas.toDataURL('image/png');
                link.click();
            });
        });
    </script>
</body>
</html>
