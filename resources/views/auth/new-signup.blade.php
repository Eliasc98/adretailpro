<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - AdRetail Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-container">
            <div class="logo">AdRetail Pro</div>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html#features">Features</a></li>
                <li><a href="index.html#pricing">Pricing</a></li>
                <li><a href="index.html#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Signup Section -->
    <section class="signup-section">
        <div class="signup-container">
            <div class="signup-box">
                <h2>Create Your Account</h2>
                <p class="signup-description">Join AdRetail Pro and start your e-commerce journey today</p>
                
                <!-- User Type Toggle -->
                <div class="user-type-toggle">
                    <button class="type-btn active" data-type="seller">
                        <i class="fas fa-store"></i>
                        Seller Account
                    </button>
                    <button class="type-btn" data-type="buyer">
                        <i class="fas fa-shopping-bag"></i>
                        Buyer Account
                    </button>
                </div>

                <!-- Signup Form -->
                <form id="signup-form" class="signup-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <div class="input-with-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" id="first-name" name="first-name" placeholder="John" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <div class="input-with-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" id="last-name" name="last-name" placeholder="Doe" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" placeholder="john@example.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <div class="input-with-icon">
                            <i class="fas fa-phone"></i>
                            <input type="tel" id="phone" name="phone" placeholder="+234 XXX XXX XXXX" required>
                        </div>
                    </div>

                    <!-- Business Type Section - Only for Sellers -->
                    <div class="business-section" id="business-section">
                        <div class="form-group">
                            <label for="business-name">Business Name</label>
                            <div class="input-with-icon">
                                <i class="fas fa-building"></i>
                                <input type="text" id="business-name" name="business-name" placeholder="Enter your business name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="business-type">Business Type</label>
                            <div class="input-with-icon">
                                <i class="fas fa-briefcase"></i>
                                <select id="business-type" name="business-type" required>
                                    <option value="">Select Business Type</option>
                                    <option value="retail">Retail Store</option>
                                    <option value="wholesale">Wholesale Business</option>
                                    <option value="manufacturer">Manufacturing Company</option>
                                    <option value="handmade">Handmade & Crafts</option>
                                    <option value="digital">Digital Products & Services</option>
                                    <option value="dropshipping">Dropshipping Business</option>
                                    <option value="franchise">Franchise</option>
                                    <option value="services">Professional Services</option>
                                    <option value="other">Other Business Type</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="product-categories">Product Categories</label>
                            <div class="input-with-icon">
                
                                <select id="product-categories" name="product-categories" multiple required>
                                    <option value="fashion">Fashion & Apparel</option>
                                    <option value="electronics">Electronics & Gadgets</option>
                                    <option value="home">Home & Garden</option>
                                    <option value="beauty">Beauty & Personal Care</option>
                                    <option value="health">Health & Wellness</option>
                                    <option value="food">Food & Beverages</option>
                                    <option value="sports">Sports & Outdoor</option>
                                    <option value="books">Books & Stationery</option>
                                    <option value="art">Art & Collectibles</option>
                                    <option value="jewelry">Jewelry & Accessories</option>
                                    <option value="automotive">Automotive & Industrial</option>
                                    <option value="kids">Kids & Baby Products</option>
                                    <option value="pets">Pet Supplies</option>
                                    <option value="digital_goods">Digital Goods</option>
                                    <option value="other">Other Categories</option>
                                </select>
                                <small class="field-hint">Hold Ctrl/Cmd to select multiple categories that best describe your products</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="business-description">Business Description</label>
                            <div class="input-with-icon">
                               
                                <textarea id="business-description" name="business-description" 
                                    placeholder="Tell us about your business, products, and what makes you unique..." required></textarea>
                                <small class="field-hint">Provide a clear description of your business and products to help customers understand your offerings</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="business-address">Business Address</label>
                            <div class="input-with-icon">
                                <i class="fas fa-location-dot"></i>
                                <textarea id="business-address" name="business-address" 
                                    placeholder="Enter your complete business address..." required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-with-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="password" name="password" placeholder="Create password" required>
                                <button type="button" class="toggle-password">
                                    
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <div class="input-with-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm password" required>
                                <button type="button" class="toggle-password">
                                   
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Shipping Address</label>
                        <div class="input-with-icon">
                            
                            <textarea id="address" name="address" placeholder="Enter your shipping address" required></textarea>
                        </div>
                    </div>

                    <div class="form-checkbox">
                        <label class="checkbox-container">
                            <input type="checkbox" required>
                            <span class="checkmark"></span>
                            <span class="checkbox-text">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></span>
                        </label>
                    </div>

                    <button type="submit" class="signup-submit-btn">
                        <span>Create Account</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>

                <div class="login-divider">
                    <span>OR</span>
                </div>

                <div class="social-login">
                    <button class="social-btn google">
                        <i class="fab fa-google"></i>
                        <span>Sign up with Google</span>
                    </button>
                    <button class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i>
                        <span>Sign up with Facebook</span>
                    </button>
                </div>

                <p class="login-prompt">
                    Already have an account? 
                    <a href="login.html" class="login-link">Login here</a>
                </p>
            </div>
        </div>
    </section>

    <script>
        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const passwordInput = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');
                
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });

        // User type toggle
        document.querySelectorAll('.type-btn').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.type-btn').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                const businessSection = document.getElementById('business-section');
                if (button.dataset.type === 'seller') {
                    businessSection.style.display = 'block';
                } else {
                    businessSection.style.display = 'none';
                }
            });
        });

        // Form validation
        document.getElementById('signup-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            // Here you would typically send the form data to your server
            alert('Account created successfully!');
        });
    </script>
</body>
</html>
