<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - AdRetail Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
      .text-danger, .text-danger1 {
        color: red;
      }

      .alert1, .alert2 {
        color: red;
        box-shadow: 0px 0px 5px 0px grey;
        background: rgba(247, 186, 204, 0.67);
        padding: 15px;
        border-radius: 5px;
        margin: 20px auto;
      }

      .alert-danger {
        background: rgba(245, 40, 145, 0.8);
        color: red;
        border-radius: 10px;
        border: 1px solid red;
        width: 100%;
        margin: 20px auto;
        padding: 20px;
      }

      #error_div {
        background: rgba(245, 40, 145, 0.8);
        color: red;
        border-radius: 10px;
        border: 2px solid red;
        width: 100%;
        margin: 20px auto;
        padding: 20px;
        display: none;
      }

      .list-container {

        background: rgba(247, 186, 204, 0.8);
        border-radius: 5px;
        padding: 10px;
      }

      .list-container > li {
        line-height: 1.5;
        list-style: none;
      }

      select {
        appearance: none; 
        border: none;
        outline: none;
        background: transparent;
        border-bottom: 1px solid #cdcdcd;
        color: #959595;
        font-size: 14px;
        width: 100%;
        padding: 5px 10px; 
        /* resize: none; */
        /* max-height: 10px; */
        /* padding: -4px 0; */
        margin-top: 20px !important;
        /* background: none; */
        border-top: 0;
        /* overflow: hidden; */
        transition: border .2s;
        -webkit-transition: border .2s;
      }
    </style>
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
                <form id="signup-form" class="signup-form" method="POST" action="{{ route('register') }}">
                    @csrf

                    @if(session('login_status'))
                        <div class="alert1">{{session('login_status')}}</div>
                    @endif

                    @if ($errors->any())
                        <div class="text-danger1">
                        <ul class="list-container">
                            @foreach ($errors->all() as $error)
                            <li class="list">{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif
                   
                    <div class="form-group">
                        <label for="first-name">Full Name</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" id="first-name" name="name" placeholder="John Paul" :value="old('name')" required autofocus autocomplete="name">
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>                        
                    

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" placeholder="john@example.com" :value="old('email')" required autocomplete="username">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <div class="input-with-icon">
                            <i class="fas fa-phone"></i>
                            <input type="tel" id="phone" name="phone" placeholder="+234 XXX XXX XXXX" :value="old('phone')" required autocomplete="username">
                        </div>
                    </div>

                    <!-- Business Type Section - Only for Sellers -->
                    <div class="business-section" id="business-section">
                        <div class="form-group">
                            <label for="business-name">Business Name</label>
                            <div class="input-with-icon">
                                <i class="fas fa-building"></i>
                                <input type="text" id="business-name" name="business_name" placeholder="Enter your business name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="business-type">Business Type</label>
                            <div class="input-with-icon">
                                <i class="fas fa-briefcase"></i>
                                <select id="business-type" name="business_type">
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
                            <label for="business-description">Business Description</label>
                            <div class="input-with-icon">
                               
                                <textarea id="business-description" name="business_description" 
                                    placeholder="Tell us about your business, products, and what makes you unique..."></textarea>
                                <small class="field-hint">Provide a clear description of your business and products to help customers understand your offerings</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="business-address">Business Address</label>
                            <div class="input-with-icon">
                                <i class="fas fa-location-dot"></i>
                                <textarea id="business-address" name="business_address" 
                                    placeholder="Enter your complete business address..."></textarea>
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
                            <!-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> -->
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <div class="input-with-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="confirm-password" name="password_confirmation" placeholder="Confirm password" required>
                                <button type="button" class="toggle-password">
                                   
                                </button>
                            </div>
                            <!-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> -->
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
                

                <p class="login-prompt">
                    Already have an account? 
                    <a href="{{asset('login')}}" class="login-link">Login here</a>
                </p>
            </div>
        </div>
    </section>

    <script>
    // JavaScript for timer feature
    setTimeout(function() {
      const dangerElements = document.getElementByClassName('text-danger');
      
        dangerElements[i].style.display = 'none';
      
    }, 10000);

    setTimeout(function() {
      const dangerElements = document.getElementByClassName('text-danger1');
      
        dangerElements[i].style.display = 'none';
      
    }, 10000);


    setTimeout(function() {
      const alertElements = document.getElementByClassName('alert1');
     
        alertElements.style.display = 'none';
      
    }, 10000);

    setTimeout(function() {
      const alertElement2 = document.getElementByClassName('alert2');
     
        alertElement2.style.display = 'none';
      
    }, 10000);

</script>

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

       
    </script>
</body>
</html>
