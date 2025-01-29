<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard - AdRetail Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="dashboard-nav">
        <div class="nav-container">
            <div class="logo">AdRetail Pro</div>
            <div class="user-menu">
                <span class="user-name">{{auth()->user()->name}}</span>
                <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}}&background=4F46E5&color=fff&size=40&rounded=true&bold=true" alt="{{auth()->user()->name}}" class="profile-img">
                <div class="dropdown-menu">
                    <a href="{{route('profile.edit')}}"><i class="fas fa-user"></i> Profile</a>
                    <!-- <a href="customer-settings.html"><i class="fas fa-cog"></i> Settings</a> -->
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
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
                    <a href="/">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
               
                <li>
                    <a href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span>My Cart</span>
                        <span class="cart-count">({{ $cartItems->count() }})</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('orders') }}">
                        <i class="fas fa-box"></i>
                        <span>My Orders</span>
                    </a>
                </li>
                
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-main">
            <!-- Search Bar -->
            

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
                            
                            <button class="btn btn-outline add-to-cart" data-product-id="{{ $limitedOffer->id }}">
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
                                    <span class="badge-price">{{$limitedOffer->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Featured Categories Grid -->
            <div class="featured-grid">
                @foreach($featuredProducts->take(3) as $product)
                <div class="featured-card">
                    <div class="card-content">
                        <div class="card-image">
                            <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1491336477066-31156b5e4f35?w=300&q=80' }}" 
                                 alt="{{ $product->name }}" />
                        </div>
                        <div class="card-details">
                            <span class="category-tag">{{ $product->category->name }}</span>
                            <h3>{{ $product->name }}</h3>
                            <p class="description">{{ $product->description }}</p>
                            <div class="offer-details">
                                @if($product->discount > 0)
                                    <div class="discount-badge">{{ $product->discount }}% OFF</div>
                                    <span class="validity">Limited time offer</span>
                                @else
                                    <div class="discount-badge">Featured</div>
                                    <span class="validity">Premium product</span>
                                @endif
                            </div>
                            <button class="btn btn-outline btn-explore add-to-cart" data-product-id="{{ $product->id }}">
                                <span>Add to cart</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
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
                    @foreach($dealsOfDay->take(3) as $deal)
                    <div class="product-card">
                        <div class="product-header">
                            <img src="{{ $deal->image ?? 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=300&q=80' }}" 
                                 alt="{{ $deal->name }}" 
                                 class="product-image">
                            <div class="product-status">-{{ $deal->discount }}%</div>
                        </div>
                        <div class="product-content">
                            <h4>{{ $deal->name }}</h4>
                            <p class="price">₦{{ number_format($deal->price * (1 - $deal->discount/100), 2) }} 
                                <span class="original-price">₦{{ number_format($deal->price, 2) }}</span>
                            </p>
                            <div class="product-metrics">
                                <div class="metric">
                                    <i class="fas fa-star"></i>
                                    <span>{{ number_format($deal->rating, 1) }}</span>
                                </div>
                                <div class="metric">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>{{ rand(45, 150) }}+ sold</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="btn btn-primary add-to-cart" data-product-id="{{ $product->id }}">
                                <i class="fas fa-cart-plus"></i>
                                <span>Add to Cart</span>
                            </button>
                        </div>
                    </div>
                    @endforeach
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

        document.addEventListener('DOMContentLoaded', function() {
            // Add to cart functionality
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.dataset.productId;
                    
                    fetch(`/cart/add/${productId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            quantity: 1
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update cart count
                            document.querySelectorAll('.cart-count').forEach(el => {
                                el.textContent = data.cart_count;
                            });
                            
                            // Show success message
                            alert('Product added to cart successfully!');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to add product to cart. Please try again.');
                    });
                });
            });
        });
    </script>
</body>
</html>
