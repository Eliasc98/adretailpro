<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdRetail Pro - Online Shopping</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-container">
            <div class="logo">AdRetail Pro</div>
            <div class="search-bar">
                <input type="text" placeholder="Search products...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
            <ul class="nav-links">
                <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fas fa-tags"></i> Categories</a></li>
                <li><a href="#"><i class="fas fa-fire"></i> Flash Sales</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="#" class="cart-btn">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </a>
                <a href="login" class="login-btn">
                    <i class="fas fa-user"></i>
                    <span>Account</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Slider -->
    <section class="hero-slider">
        <div class="slider-container">
            <!-- Slider images will be handled by JavaScript -->
            <div class="slide active">
                <img src="https://ng.jumia.is/cms/0-1-weekly-cps/0-2024/Week-4-SDD/712x384.jpg" alt="Special Offer">
                <div class="slide-content">
                    <h2>Flash Sale</h2>
                    <p>Up to 70% off on selected items</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories">
        <h2>Shop By Category</h2>
        <div class="category-grid">
            <a href="#" class="category-card">
                <i class="fas fa-mobile-alt"></i>
                <span>Electronics</span>
            </a>
            <a href="#" class="category-card">
                <i class="fas fa-tshirt"></i>
                <span>Fashion</span>
            </a>
            <a href="#" class="category-card">
                <i class="fas fa-home"></i>
                <span>Home & Living</span>
            </a>
            <a href="#" class="category-card">
                <i class="fas fa-heartbeat"></i>
                <span>Health & Beauty</span>
            </a>
        </div>
    </section>

    <!-- Flash Deals Section -->
    <section class="flash-deals">
        <div class="section-header">
            <h2>Flash Deals</h2>
            <div class="countdown">
                Ends in: <span id="deal-timer">23:59:59</span>
            </div>
        </div>
        <div class="products-grid">
            <!-- Product cards will be populated dynamically -->
        </div>
    </section>

    <!-- Popular Products Section -->
    <section class="popular-products">
        <h2>Popular Products</h2>
        <div class="products-grid">
            <!-- Sample product cards -->
            <div class="product-card">
                <div class="product-badge">-20%</div>
                <img src="{{ asset('images/products/sample1.jpg') }}" alt="Product">
                <div class="product-info">
                    <h3>Wireless Earbuds</h3>
                    <div class="product-price">
                        <span class="current-price">$79.99</span>
                        <span class="original-price">$99.99</span>
                    </div>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>(245)</span>
                    </div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
            <!-- More product cards will be added dynamically -->
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Customer Service</h3>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Shipping Info</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>About Us</h3>
                <ul>
                    <li><a href="#">About AdRetail Pro</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Download Our App</h3>
                <div class="app-buttons">
                    <a href="#" class="app-button">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg" alt="App Store">
                    </a>
                    <a href="#" class="app-button">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Play Store">
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('script.js') }}"></script>
</body>
</html>
