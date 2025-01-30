<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdRetail Pro - Your Ultimate E-commerce Solution</title>
    <link rel="stylesheet" href="{{asset('styles.css')}}">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .products {
            padding: 4rem 2rem;
            background: #f8f9fa;
        }

        .products h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 2rem;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            background: #007bff;
            color: white;
        }

        .product-badge.out-of-stock {
            background: #dc3545;
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-info h3 {
            font-size: 1.2rem;
            color: #333;
            margin: 0 0 0.5rem 0;
            height: 2.8em;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .product-category {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .product-description {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            height: 3.6em;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #28a745;
            margin-bottom: 1rem;
        }

        .add-to-cart-form {
            margin-top: 1rem;
        }

        .add-to-cart-btn, 
        .login-to-buy-btn,
        .out-of-stock-btn {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .add-to-cart-btn {
            background: #007bff;
            color: white;
        }

        .add-to-cart-btn:hover {
            background: #0056b3;
        }

        .login-to-buy-btn {
            background: #6c757d;
            color: white;
            text-decoration: none;
        }

        .login-to-buy-btn:hover {
            background: #5a6268;
        }

        .out-of-stock-btn {
            background: #dc3545;
            color: white;
            opacity: 0.7;
            cursor: not-allowed;
        }

        .no-products {
            grid-column: 1 / -1;
            text-align: center;
            padding: 3rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .no-products i {
            font-size: 3rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .no-products p {
            color: #6c757d;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .products {
                padding: 2rem 1rem;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1rem;
            }

            .product-info {
                padding: 1rem;
            }
        }

        /* Contact Form Styles */
        .contact {
            padding: 4rem 2rem;
            background: #fff;
        }

        .contact h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 2rem;
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0,123,255,0.25);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background: #0056b3;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            font-weight: 500;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        @media (max-width: 768px) {
            .contact {
                padding: 2rem 1rem;
            }

            .contact-form {
                padding: 1.5rem;
            }
        }
    </style>
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
        <h2>Our Products</h2>
        <div class="products-grid">
            @forelse ($products as $product)
                <div class="product-card">
                    @if ($product->stock < 5 && $product->stock > 0)
                        <div class="product-badge">Low Stock</div>
                    @elseif ($product->stock == 0)
                        <div class="product-badge out-of-stock">Out of Stock</div>
                    @endif
                    
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                        <p class="product-category">
                            <i class="fas fa-tag"></i> 
                            {{ $product->category->name ?? 'Uncategorized' }}
                        </p>
                        <p class="product-description">{{ Str::limit($product->description, 100) }}</p>
                        <div class="product-price">₦{{ number_format($product->price, 2) }}</div>
                        
                        @auth
                            @if ($product->stock > 0)
                                <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <button type="submit" class="add-to-cart-btn">
                                        <i class="fas fa-cart-plus"></i> Add to Cart
                                    </button>
                                </form>
                            @else
                                <button class="out-of-stock-btn" disabled>
                                    <i class="fas fa-ban"></i> Out of Stock
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="login-to-buy-btn">
                                <i class="fas fa-sign-in-alt"></i> Login to Purchase
                            </a>
                        @endauth
                    </div>
                </div>
            @empty
                <div class="no-products">
                    <i class="fas fa-box-open"></i>
                    <p>No products available at the moment.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h2>Get In Touch</h2>
        <div class="contact-form">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" 
                           class="form-control @error('full_name') is-invalid @enderror" 
                           id="full_name" 
                           name="full_name" 
                           value="{{ old('full_name') }}" 
                           required>
                    @error('full_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" 
                           class="form-control @error('subject') is-invalid @enderror" 
                           id="subject" 
                           name="subject" 
                           value="{{ old('subject') }}" 
                           required>
                    @error('subject')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" 
                              id="message" 
                              name="message" 
                              required>{{ old('message') }}</textarea>
                    @error('message')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Send Message
                </button>
            </form>
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
