<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Advertisements - AdRetail Pro</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="dashboard-nav">
        <div class="nav-container">
            <div class="logo">AdRetail Pro</div>
            <div class="user-menu">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4F46E5&color=fff&size=40&rounded=true&bold=true" alt="{{ Auth::user()->name }}" class="profile-img">
                <div class="dropdown-menu">
                    <a href="{{ route('profile.edit') }}"><i class="fas fa-user"></i> Profile</a>
                    <a href="{{ route('profile.edit') }}"><i class="fas fa-cog"></i> Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
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
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-chart-line"></i>
                        <span>Overview</span>
                    </a>
                </li>
                
                <li class="active">
                    <a href="{{ route('dashboard.advertisements') }}">
                        <i class="fas fa-ad"></i>
                        <span>Manage Ads</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.blogs') }}">
                        <i class="fas fa-blog"></i>
                        <span>Manage Blogs</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.advertisements.create') }}">
                        <i class="fas fa-plus"></i>
                        <span>Create Ad</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.blogs.create') }}">
                        <i class="fas fa-plus"></i>
                        <span>Create Blog</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-main">
            <section class="dashboard-section" id="manage-ads">
                <div class="section-header">
                    <h2>Manage Advertisements</h2>
                    <div class="header-actions">
                        <a href="{{ route('dashboard.advertisements.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Create New Ad
                        </a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="products-grid">
                    @forelse($advertisements as $ad)
                        <div class="product-card">
                            <div class="product-header">
                                <img src="{{ $ad->image_path ? asset('storage/'.$ad->image_path) : 'https://via.placeholder.com/400x300' }}" 
                                     alt="{{ $ad->title }}" class="product-image">
                                <div class="product-status {{ $ad->is_active ? 'bestseller' : 'low-stock' }}">
                                    {{ $ad->is_active ? 'Active' : 'Inactive' }}
                                </div>
                            </div>
                            <div class="product-content">
                                <h4>{{ $ad->title }}</h4>
                                <p class="price">{{ $ad->position }}</p>
                                <div class="product-metrics">
                                    <div class="metric">
                                        <i class="fas fa-calendar-start"></i>
                                        <span>{{ $ad->start_date ? $ad->start_date->format('Y-m-d') : 'No Start Date' }}</span>
                                    </div>
                                    <div class="metric">
                                        <i class="fas fa-calendar-end"></i>
                                        <span>{{ $ad->end_date ? $ad->end_date->format('Y-m-d') : 'No End Date' }}</span>
                                    </div>
                                </div>
                                <div class="product-actions">
                                    <a href="{{ route('dashboard.advertisements.edit', $ad) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('dashboard.advertisements.destroy', $ad) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this advertisement?');"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info text-center w-100">
                            <i class="fas fa-info-circle mr-2"></i>
                            You haven't created any advertisements yet. 
                            <a href="{{ route('dashboard.advertisements.create') }}" class="alert-link">Create your first advertisement</a>
                        </div>
                    @endforelse
                </div>

                {{ $advertisements->links('pagination::bootstrap-5') }}
            </section>
        </main>
    </div>

    <style>
        /* Additional Advertisements Specific Styles */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .product-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-header {
            position: relative;
            height: 200px;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-status {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .product-status.bestseller {
            background-color: #28a745;
            color: white;
        }

        .product-status.low-stock {
            background-color: #dc3545;
            color: white;
        }

        .product-content {
            padding: 15px;
        }

        .product-content h4 {
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .product-metrics {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .metric {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .metric i {
            margin-right: 5px;
        }

        .product-actions {
            display: flex;
            justify-content: space-between;
        }

        .product-actions .btn {
            display: inline-flex;
            align-items: center;
        }
    </style>
</body>
</html>