<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard - AdRetail Pro</title>
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
                    <a href="buyer-dashboard.html">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
               
                <li>
                    <a href="cart.html">
                        <i class="fas fa-shopping-cart"></i>
                        <span>My Cart</span>
                        <span class="cart-count">0</span>
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
            <!-- Search Bar -->
            <div class="search-bar">
                <input type="text" placeholder="Search for products..." class="search-input">
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>

            <!-- Hero Banner Section -->
            <section class="dashboard-section hero-banner">
                <div class="banner-content">
                    <div class="banner-text">
                        <span class="banner-label">Limited Time Offer</span>
                        <h2>Exclusive Collection</h2>
                        <h3>Premium Furniture</h3>
                        <div class="banner-features">
                            <div class="feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Premium Quality</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-truck"></i>
                                <span>Free Shipping</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-shield-alt"></i>
                                <span>2 Year Warranty</span>
                            </div>
                        </div>
                        <div class="banner-offer">
                            <div class="offer-tag">
                                <span class="discount">50%</span>
                                <span class="off">OFF</span>
                            </div>
                            <div class="offer-text">
                                <p>On Selected Items</p>
                                <p class="ends">Offer ends in <span class="highlight">48 hours</span></p>
                            </div>
                        </div>
                        <div class="banner-actions">
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-shopping-cart"></i> Shop Now
                            </button>
                            <button class="btn btn-outline add-to-cart">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                    <div class="banner-image">
                        <div class="image-container">
                            <img src="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?w=400&q=80" alt="Modern Chair" />
                            <div class="image-badge">
                                <div class="badge-content">
                                    <span class="badge-label">Best Seller</span>
                                    <span class="badge-price">₦29,999</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Featured Categories Grid -->
            <div class="featured-grid">
                <div class="featured-card">
                    <div class="card-content">
                        <div class="card-image">
                            <img src="https://images.unsplash.com/photo-1491336477066-31156b5e4f35?w=300&q=80" alt="AVAKEN Collection" />
                        </div>
                        <div class="card-details">
                            <span class="category-tag">New Collection</span>
                            <h3>AWAKEN Collection</h3>
                            <p class="description">Discover our latest premium designs</p>
                            <div class="offer-details">
                                <div class="discount-badge">30% OFF</div>
                                <span class="validity">Limited time offer</span>
                            </div>
                            <button class="btn btn-outline btn-explore">
                                <span>Explore Collection</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="featured-card">
                    <div class="card-content">
                        <div class="card-image">
                            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=300&q=80" alt="Iconic Watches" />
                        </div>
                        <div class="card-details">
                            <span class="category-tag">Trending</span>
                            <h3>Iconic Watches</h3>
                            <p class="description">Timeless elegance for every occasion</p>
                            <div class="offer-details">
                                <div class="discount-badge">Exclusive</div>
                                <span class="validity">Premium collection</span>
                            </div>
                            <button class="btn btn-outline btn-explore">
                                <span>View Collection</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="featured-card">
                    <div class="card-content">
                        <div class="card-image">
                            <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=300&q=80" alt="Year End Sale" />
                        </div>
                        <div class="card-details">
                            <span class="category-tag">Special Offer</span>
                            <h3>Year End Sale</h3>
                            <p class="description">Massive discounts on top brands</p>
                            <div class="offer-details">
                                <div class="discount-badge">Up to 50%</div>
                                <span class="validity">Ends soon</span>
                            </div>
                            <button class="btn btn-outline btn-explore">
                                <span>Shop Now</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deals of the Day -->
            <section class="dashboard-section">
                <div class="section-header">
                    <h2>Deals of the Day</h2>
                    <div class="header-actions">
                        <div class="countdown">
                            <i class="fas fa-clock"></i>
                            <span class="timer">20:45:12 Left</span>
                        </div>
                        <button class="btn btn-outline">
                            <span>View All Deals</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div class="products-grid">
                    <!-- Product Card 1 -->
                    <div class="product-card">
                        <div class="product-header">
                            <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=300&q=80" 
                                 alt="Red leather GUCCI bag" 
                                 class="product-image">
                            <div class="product-status">-30%</div>
                        </div>
                        <div class="product-content">
                            <h4>Red leather GUCCI bag</h4>
                            <p class="price">₦50,000 <span class="original-price">₦70,000</span></p>
                            <div class="product-metrics">
                                <div class="metric">
                                    <i class="fas fa-star"></i>
                                    <span>4.8</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>150+ sold</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-cart-plus"></i>
                                <span>Add to Cart</span>
                            </button>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="product-card">
                        <div class="product-header">
                            <img src="https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=300&q=80" 
                                 alt="LEARX face cream" 
                                 class="product-image">
                            <div class="product-status">-25%</div>
                        </div>
                        <div class="product-content">
                            <h4>LEARX face cream</h4>
                            <p class="price">₦3,000 <span class="original-price">₦4,000</span></p>
                            <div class="product-metrics">
                                <div class="metric">
                                    <i class="fas fa-star"></i>
                                    <span>4.6</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>90+ sold</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-cart-plus"></i>
                                <span>Add to Cart</span>
                            </button>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="product-card">
                        <div class="product-header">
                            <img src="https://images.unsplash.com/photo-1452780212940-6f5c0d14d848?w=300&q=80" 
                                 alt="Fuji Film DSLR camera" 
                                 class="product-image">
                            <div class="product-status">-20%</div>
                        </div>
                        <div class="product-content">
                            <h4>Fuji Film DSLR camera</h4>
                            <p class="price">₦25,000 <span class="original-price">₦30,000</span></p>
                            <div class="product-metrics">
                                <div class="metric">
                                    <i class="fas fa-star"></i>
                                    <span>4.9</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>45+ sold</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="btn btn-primary add-to-cart">
                                <i class="fas fa-cart-plus"></i>
                                <span>Add to Cart</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Seller Contact Section -->
            <section class="dashboard-section seller-contact-section">
                <div class="section-header">
                    <h2>Contact Sellers</h2>
                    <div class="header-actions">
                        <button class="btn btn-outline">
                            <span>View All Sellers</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            
                <div class="seller-grid">
                    <!-- Seller Card 1 -->
                    <div class="seller-card">
                        <div class="seller-info">
                            <img src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=4F46E5&color=fff&size=48" 
                                 alt="Sarah Johnson" class="seller-avatar">
                            <div class="seller-details">
                                <h4 class="seller-name">Sarah Johnson</h4>
                                <div class="seller-stats">
                                    <span><i class="fas fa-star"></i> 4.9</span>
                                    <span><i class="fas fa-box"></i> 150+ products</span>
                                </div>
                            </div>
                        </div>
                        <div class="seller-actions">
                            <button class="btn btn-primary">
                                <i class="fas fa-comment"></i> Chat Now
                            </button>
                            <button class="btn btn-outline">
                                <i class="fas fa-store"></i> View Store
                            </button>
                        </div>
                    </div>
            
                    <!-- Seller Card 2 -->
                    <div class="seller-card">
                        <div class="seller-info">
                            <img src="https://ui-avatars.com/api/?name=David+Chen&background=4F46E5&color=fff&size=48" 
                                 alt="David Chen" class="seller-avatar">
                            <div class="seller-details">
                                <h4 class="seller-name">David Chen</h4>
                                <div class="seller-stats">
                                    <span><i class="fas fa-star"></i> 4.8</span>
                                    <span><i class="fas fa-box"></i> 200+ products</span>
                                </div>
                            </div>
                        </div>
                        <div class="seller-actions">
                            <button class="btn btn-primary">
                                <i class="fas fa-comment"></i> Chat Now
                            </button>
                            <button class="btn btn-outline">
                                <i class="fas fa-store"></i> View Store
                            </button>
                        </div>
                    </div>
            
                    <!-- Seller Card 3 -->
                    <div class="seller-card">
                        <div class="seller-info">
                            <img src="https://ui-avatars.com/api/?name=Emma+Williams&background=4F46E5&color=fff&size=48" 
                                 alt="Emma Williams" class="seller-avatar">
                            <div class="seller-details">
                                <h4 class="seller-name">Emma Williams</h4>
                                <div class="seller-stats">
                                    <span><i class="fas fa-star"></i> 4.7</span>
                                    <span><i class="fas fa-box"></i> 120+ products</span>
                                </div>
                            </div>
                        </div>
                        <div class="seller-actions">
                            <button class="btn btn-primary">
                                <i class="fas fa-comment"></i> Chat Now
                            </button>
                            <button class="btn btn-outline">
                                <i class="fas fa-store"></i> View Store
                            </button>
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>

    <script>
        // Cart functionality
        const cartCount = document.querySelector('.cart-count');
        const addToCartButtons = document.querySelectorAll('.add-to-cart');
        let cartItems = 0;

        addToCartButtons.forEach(button => {
            button.addEventListener('click', () => {
                cartItems++;
                cartCount.textContent = cartItems;
                // Add animation effect
                button.innerHTML = '<i class="fas fa-check"></i> Added';
                button.classList.add('added');
                setTimeout(() => {
                    button.innerHTML = '<i class="fas fa-cart-plus"></i> Add to Cart';
                    button.classList.remove('added');
                }, 2000);
            });
        });

        // User menu dropdown
        const userMenu = document.querySelector('.user-menu');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        userMenu.addEventListener('click', () => {
            dropdownMenu.classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!userMenu.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    </script>
</body>
</html>
