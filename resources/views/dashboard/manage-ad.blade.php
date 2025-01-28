<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Ads - AdRetail Pro</title>
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
                
                <li class="active">
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
            <section class="dashboard-section" id="manage-ads">
                <div class="section-header">
                    <h2>Manage Advertisements</h2>
                    <div class="create-ad-dropdown">
                        <button class="btn btn-primary dropdown-trigger">
                            <i class="fas fa-plus"></i> Create New Ad
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#" class="dropdown-item" data-type="image">
                                <i class="fas fa-image"></i>
                                <div class="dropdown-item-content">
                                    <span class="item-title">Image Ad</span>
                                    <span class="item-description">Create an ad with a single image or carousel</span>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item" data-type="video">
                                <i class="fas fa-video"></i>
                                <div class="dropdown-item-content">
                                    <span class="item-title">Video Ad</span>
                                    <span class="item-description">Create an ad with video content</span>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item" data-type="collection">
                                <i class="fas fa-layer-group"></i>
                                <div class="dropdown-item-content">
                                    <span class="item-title">Collection Ad</span>
                                    <span class="item-description">Create an ad showcasing multiple products</span>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item" data-type="story">
                                <i class="fas fa-book-open"></i>
                                <div class="dropdown-item-content">
                                    <span class="item-title">Story Ad</span>
                                    <span class="item-description">Create an immersive full-screen ad</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Filters and Search -->
                <div class="filters-section">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search ads...">
                    </div>
                    <div class="filter-group">
                        <select class="filter-select">
                            <option value="">Status</option>
                            <option value="active">Active</option>
                            <option value="paused">Paused</option>
                            <option value="completed">Completed</option>
                            <option value="draft">Draft</option>
                        </select>
                        <select class="filter-select">
                            <option value="">Campaign Type</option>
                            <option value="awareness">Brand Awareness</option>
                            <option value="traffic">Website Traffic</option>
                            <option value="sales">Product Sales</option>
                            <option value="leads">Lead Generation</option>
                        </select>
                        <select class="filter-select">
                            <option value="">Date Range</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                </div>

                <!-- Ads Grid -->
                <div class="ads-grid">
                    <!-- Ad Card 1 -->
                    <div class="ad-card">
                        <div class="ad-header">
                            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&q=80" alt="Premium Watch Campaign" class="ad-image">
                            <div class="ad-status active">Active</div>
                        </div>
                        <div class="ad-content">
                            <h3>Premium Watch Campaign</h3>
                            <p class="ad-description">Luxury watch promotion targeting fashion enthusiasts</p>
                            <div class="ad-metrics">
                                <div class="metric">
                                    <i class="fas fa-eye"></i>
                                    <span>2.5K Views</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-mouse-pointer"></i>
                                    <span>4.2% CTR</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>150 Sales</span>
                                </div>
                            </div>
                            <div class="ad-progress">
                                <div class="progress-label">
                                    <span>Budget Spent</span>
                                    <span>₦45,000/₦60,000</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: 75%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="ad-actions">
                            <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon" title="Pause"><i class="fas fa-pause"></i></button>
                            <button class="btn-icon" title="Analytics"><i class="fas fa-chart-line"></i></button>
                            <button class="btn-icon" title="Delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <!-- Ad Card 2 -->
                    <div class="ad-card">
                        <div class="ad-header">
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&q=80" alt="Headphones Promotion" class="ad-image">
                            <div class="ad-status paused">Paused</div>
                        </div>
                        <div class="ad-content">
                            <h3>Wireless Headphones Promo</h3>
                            <p class="ad-description">Premium audio experience campaign</p>
                            <div class="ad-metrics">
                                <div class="metric">
                                    <i class="fas fa-eye"></i>
                                    <span>1.8K Views</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-mouse-pointer"></i>
                                    <span>3.8% CTR</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>85 Sales</span>
                                </div>
                            </div>
                            <div class="ad-progress">
                                <div class="progress-label">
                                    <span>Budget Spent</span>
                                    <span>₦28,000/₦40,000</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: 70%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="ad-actions">
                            <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon" title="Resume"><i class="fas fa-play"></i></button>
                            <button class="btn-icon" title="Analytics"><i class="fas fa-chart-line"></i></button>
                            <button class="btn-icon" title="Delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <!-- Ad Card 3 -->
                    <div class="ad-card">
                        <div class="ad-header">
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&q=80" alt="Running Shoes Campaign" class="ad-image">
                            <div class="ad-status completed">Completed</div>
                        </div>
                        <div class="ad-content">
                            <h3>Running Shoes Campaign</h3>
                            <p class="ad-description">Sports and fitness promotion</p>
                            <div class="ad-metrics">
                                <div class="metric">
                                    <i class="fas fa-eye"></i>
                                    <span>3.2K Views</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-mouse-pointer"></i>
                                    <span>5.1% CTR</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>210 Sales</span>
                                </div>
                            </div>
                            <div class="ad-progress">
                                <div class="progress-label">
                                    <span>Budget Spent</span>
                                    <span>₦50,000/₦50,000</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="ad-actions">
                            <button class="btn-icon" title="View"><i class="fas fa-eye"></i></button>
                            <button class="btn-icon" title="Duplicate"><i class="fas fa-copy"></i></button>
                            <button class="btn-icon" title="Analytics"><i class="fas fa-chart-line"></i></button>
                            <button class="btn-icon" title="Archive"><i class="fas fa-archive"></i></button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Create Ad Dropdown functionality
        const dropdownTrigger = document.querySelector('.dropdown-trigger');
        const dropdownContent = document.querySelector('.dropdown-content');
        
        // Add overlay to body
        const overlay = document.createElement('div');
        overlay.className = 'dropdown-overlay';
        document.body.appendChild(overlay);

        dropdownTrigger.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdownContent.classList.toggle('show');
            overlay.classList.toggle('show');
            dropdownTrigger.querySelector('.fa-chevron-down').style.transform = 
                dropdownContent.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0)';
        });

        // Close dropdown when clicking outside
        overlay.addEventListener('click', () => {
            dropdownContent.classList.remove('show');
            overlay.classList.remove('show');
            dropdownTrigger.querySelector('.fa-chevron-down').style.transform = 'rotate(0)';
        });

        // Handle dropdown item clicks
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const adType = item.getAttribute('data-type');
                // Here you can handle different ad type creation
                alert(`Creating new ${adType} ad...`);
                dropdownContent.classList.remove('show');
                overlay.classList.remove('show');
            });
        });

        // Toggle user menu
        document.querySelector('.profile-img').addEventListener('click', function() {
            document.querySelector('.dropdown-menu').classList.toggle('show');
        });

        // Search functionality
        const searchInput = document.querySelector('.search-box input');
        searchInput.addEventListener('input', function(e) {
            // Implement search functionality
            const searchTerm = e.target.value.toLowerCase();
            // Filter ads based on search term
        });

        // Filter functionality
        document.querySelectorAll('.filter-select').forEach(select => {
            select.addEventListener('change', function() {
                // Implement filter functionality
                const filterValue = this.value;
                // Filter ads based on selected value
            });
        });
    </script>
</body>
</html>
