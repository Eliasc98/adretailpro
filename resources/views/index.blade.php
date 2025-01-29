<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdRetail Pro - Your Ultimate E-commerce Solution</title>
    <link rel="stylesheet" href="{{asset('styles.css')}}">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-container">
            <div class="logo">
                <img src="{{asset('logo.png')}}" alt="adretail_2logo" style="width: 70px;"/>
            </div>
            <ul class="nav-links">
                <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fas fa-tags"></i> Categories</a></li>
                <li><a href="#"><i class="fas fa-fire"></i> Flash Sales</a></li>
            </ul>           
             
        @if (Route::has('login'))
            <div class="auth-buttons">
                @auth
                    <a href="{{ url('/dashboard') }}" class="login-btn">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span>My Cart</span>
                        <span class="cart-count">({{ $cartItems->count() }})</span>
                    </a>
                
                @else
                    <a href="{{ route('login') }}" class="login-btn">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="signup-btn">
                            <i class="fas fa-user-plus"></i>
                            <span>Sign Up</span>
                        </a>
                    @endif
                @endauth
            </div>
        @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-text">
                <h1>Transform Your Business with AdRetail Pro</h1>
                <p class="hero-subtitle">The ultimate e-commerce platform connecting sellers and buyers worldwide</p>
                <div class="hero-features">
                    <div class="hero-feature">
                        <i class="fas fa-check-circle"></i>
                        <span>Secure Transactions</span>
                    </div>
                    <div class="hero-feature">
                        <i class="fas fa-check-circle"></i>
                        <span>24/7 Support</span>
                    </div>
                    <div class="hero-feature">
                        <i class="fas fa-check-circle"></i>
                        <span>Global Marketplace</span>
                    </div>
                </div>
                <div class="cta-buttons">
                    <button class="seller-btn">Start Selling</button>
                    <button class="buyer-btn">Start Shopping</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <h2>Why Choose AdRetail Pro?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-store"></i>
                <h3>Easy Store Setup</h3>
                <p>Create your online store in minutes with our intuitive tools</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Secure Transactions</h3>
                <p>Advanced security measures to protect both buyers and sellers</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-chart-line"></i>
                <h3>Analytics Dashboard</h3>
                <p>Track your performance with detailed analytics and insights</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-mobile-alt"></i>
                <h3>Mobile Friendly</h3>
                <p>Seamless experience across all devices</p>
            </div>
        </div>
    </section>

    <!-- Products Section -->
<section id="products" class="products">
        <h2>Featured Products</h2>
        <div class="products-grid">
            <div class="product-card">
                <div class="product-badge">-25%</div>
                <img src="https://ng.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/82/7645002/1.jpg" alt="iPhone 13">
                <div class="product-info">
                    <h3>Apple iPhone 13 - 128GB</h3>
                    <div class="product-price">
                        <span class="current-price">₦599,999</span>
                        <span class="original-price">₦799,999</span>
                    </div>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>(342)</span>
                    </div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-badge">New</div>
                <img src="https://ng.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/06/2158722/1.jpg" alt="Samsung TV">
                <div class="product-info">
                    <h3>Samsung 43" Smart TV</h3>
                    <div class="product-price">
                        <span class="current-price">₦189,990</span>
                        <span class="original-price">₦250,000</span>
                    </div>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(128)</span>
                    </div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-badge">-30%</div>
                <img src="https://ng.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/94/2741412/1.jpg" alt="Nike Sneakers">
                <div class="product-info">
                    <h3>Nike Air Max Running Shoes</h3>
                    <div class="product-price">
                        <span class="current-price">₦28,500</span>
                        <span class="original-price">₦40,999</span>
                    </div>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span>(89)</span>
                    </div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>

            <div class="product-card">
                <img src="https://ng.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/01/241776/1.jpg" alt="PS5">
                <div class="product-info">
                    <h3>Sony PlayStation 5 Console</h3>
                    <div class="product-price">
                        <span class="current-price">₦489,999</span>
                        <span class="original-price">₦550,000</span>
                    </div>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(456)</span>
                    </div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-badge">Hot</div>
                <img src="https://ng.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/26/8913812/1.jpg" alt="Laptop">
                <div class="product-info">
                    <h3>HP Pavilion Gaming Laptop</h3>
                    <div class="product-price">
                        <span class="current-price">₦459,999</span>
                        <span class="original-price">₦599,999</span>
                    </div>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>(234)</span>
                    </div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="contact-container">
            <div class="contact-info">
                <h2>Get In Touch</h2>
                <p class="contact-description">Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                <div class="contact-details">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p>support@adretailpro.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p>+234 9021493100</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-location-dot"></i>
                        <div>
                            <h3>Location</h3>
                            <p>123 Business Ave, Suite 100<br>San Francisco, CA 94107</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form-container">
                <form id="contact-form" class="contact-form">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="john@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="user-type">I am a</label>
                        <select id="user-type" name="user-type" required>
                            <option value="">Select User Type</option>
                            <option value="seller">Seller</option>
                            <option value="buyer">Buyer</option>
                            <option value="both">Both</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="How can we help you?" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">
                        <span>Send Message</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>AdRetail Pro</h4>
                <p>Your trusted e-commerce solution for success</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Connect With Us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 AdRetail Pro. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
