<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AdRetail Pro</title>
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

    <!-- Login Section -->
    <section class="login-section">
        <div class="login-container">
            <div class="login-box">
                <h2>Welcome Back</h2>
                <p class="login-description">Sign in to your AdRetail Pro account</p>
                
                <!-- User Type Toggle -->
                <div class="user-type-toggle">
                    <button class="type-btn active" data-type="seller">
                        <i class="fas fa-store"></i>
                        Seller
                    </button>
                    <button class="type-btn" data-type="buyer">
                        <i class="fas fa-shopping-bag"></i>
                        Buyer
                    </button>
                </div>

                
                <form id="login-form" class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" placeholder="your@email.com" :value="old('email')" required autofocus autocomplete="username">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required autocomplete="current-password">
                            <button type="button" class="toggle-password">
                                <i class="fas fa-eye"></i>
                            </button>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                    
                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>
                        <a href="#" class="forgot-password">Forgot Password?</a>
                    </div>

                    <button type="submit" class="login-submit-btn">
                        <span>Sign In</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <p class="signup-prompt">
                    Don't have an account? 
                    <a href="{{route('register')}}" class="signup-link">Sign up now</a>
                </p>
            </div>
        </div>
    </section>

    <script>
        // Toggle password visibility
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const passwordInput = document.querySelector('#password');
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

        // User type toggle
        document.querySelectorAll('.type-btn').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.type-btn').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
            });
        });

        
    </script>
</body>
</html>
