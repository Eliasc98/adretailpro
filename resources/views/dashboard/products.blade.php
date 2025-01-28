<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - AdRetail Pro</title>
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
            
                <li class="active">
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
            <section class="dashboard-section">
                <!-- Header -->
                <div class="section-header">
                    <h2>Products</h2>
                    <div class="header-actions">
                
                        <button class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add Product
                        </button>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="filters-section">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search products...">
                    </div>
                    <div class="filter-group">
                        <select class="filter-select">
                            <option value="">Category</option>
                            <option value="electronics">Electronics</option>
                            <option value="fashion">Fashion</option>
                            <option value="home">Home & Living</option>
                            <option value="sports">Sports</option>
                        </select>
                        <select class="filter-select">
                            <option value="">Price Range</option>
                            <option value="0-1000">₦0 - ₦1,000</option>
                            <option value="1000-5000">₦1,000 - ₦5,000</option>
                            <option value="5000-20000">₦5,000 - ₦20,000</option>
                            <option value="20000+">₦20,000+</option>
                        </select>
                        <select class="filter-select">
                            <option value="">Stock Status</option>
                            <option value="in-stock">In Stock</option>
                            <option value="low-stock">Low Stock</option>
                            <option value="out-of-stock">Out of Stock</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="products-grid">
                    <!-- Product Card 1 -->
                    <div class="product-card">
                        <div class="product-header">
                            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&q=80" alt="Premium Watch" class="product-image">
                            <div class="product-status trending">Trending</div>
                        </div>
                        <div class="product-content">
                            <h4>Premium Watch</h4>
                            <p class="price">₦29,000</p>
                            <div class="product-metrics">
                                <div class="metric">
                                    <i class="fas fa-chart-line"></i>
                                    <span>150 sales</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-star"></i>
                                    <span>4.8 rating</span>
                                </div>
                            </div>
                            <div class="product-progress">
                                <div class="progress-label">
                                    <span>Stock Level</span>
                                    <span>75%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: 75%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                            <button class="btn-icon" title="Delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="product-card">
                        <div class="product-header">
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&q=80" alt="Wireless Headphones" class="product-image">
                            <div class="product-status bestseller">Bestseller</div>
                        </div>
                        <div class="product-content">
                            <h4>Wireless Headphones</h4>
                            <p class="price">₦19,000</p>
                            <div class="product-metrics">
                                <div class="metric">
                                    <i class="fas fa-chart-line"></i>
                                    <span>120 sales</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-star"></i>
                                    <span>4.7 rating</span>
                                </div>
                            </div>
                            <div class="product-progress">
                                <div class="progress-label">
                                    <span>Stock Level</span>
                                    <span>45%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: 45%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                            <button class="btn-icon" title="Delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="product-card">
                        <div class="product-header">
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&q=80" alt="Running Shoes" class="product-image">
                            <div class="product-status new">New</div>
                        </div>
                        <div class="product-content">
                            <h4>Running Shoes</h4>
                            <p class="price">₦15,000</p>
                            <div class="product-metrics">
                                <div class="metric">
                                    <i class="fas fa-chart-line"></i>
                                    <span>95 sales</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-star"></i>
                                    <span>4.6 rating</span>
                                </div>
                            </div>
                            <div class="product-progress">
                                <div class="progress-label">
                                    <span>Stock Level</span>
                                    <span>90%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: 90%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                            <button class="btn-icon" title="Delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="product-card">
                        <div class="product-header">
                            <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?w=400&q=80" alt="Smart Watch" class="product-image">
                            <div class="product-status low-stock">Low Stock</div>
                        </div>
                        <div class="product-content">
                            <h4>Smart Watch Pro</h4>
                            <p class="price">₦35,000</p>
                            <div class="product-metrics">
                                <div class="metric">
                                    <i class="fas fa-chart-line"></i>
                                    <span>78 sales</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-star"></i>
                                    <span>4.9 rating</span>
                                </div>
                            </div>
                            <div class="product-progress">
                                <div class="progress-label">
                                    <span>Stock Level</span>
                                    <span>15%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress" style="width: 15%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                            <button class="btn-icon" title="Delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination-container">
                    <div class="pagination-info">Showing 1 to 4 of 12 products</div>
                    <div class="pagination">
                        <button class="btn btn-icon" disabled><i class="fas fa-chevron-left"></i></button>
                        <button class="btn btn-icon active">1</button>
                        <button class="btn btn-icon">2</button>
                        <button class="btn btn-icon">3</button>
                        <button class="btn btn-icon"><i class="fas fa-chevron-right"></i></button>
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
