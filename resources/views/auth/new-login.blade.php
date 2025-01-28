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

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
                <form id="login-form" class="login-form">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" placeholder="your@email.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required>
                            <button type="button" class="toggle-password">
                                <i class="fas fa-eye"></i>
                            </button>
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

                <div class="login-divider">
                    <span>OR</span>
                </div>

                <div class="social-login">
                    <button class="social-btn google">
                        <i class="fab fa-google"></i>
                        <span>Continue with Google</span>
                    </button>
                    <button class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i>
                        <span>Continue with Facebook</span>
                    </button>
                </div>

                <p class="signup-prompt">
                    Don't have an account? 
                    <a href="signup.html" class="signup-link">Sign up now</a>
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

        // Form submission
        document.querySelector('.login-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const userType = document.querySelector('.type-btn.active').getAttribute('data-type');
            
            // For demo purposes, we'll redirect without actual authentication
            if (userType === 'seller') {
                window.location.href = 'seller-dashboard.html';
            } else {
                // Redirect buyers to their dashboard or homepage
                window.location.href = 'index.html';
            }
        });
    </script>
</body>
</html>
