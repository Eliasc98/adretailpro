<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blogs - AdRetail Pro</title>
    
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
<div class="container-fluid blogs-management">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">My Blogs</h3>
                    <a href="{{ route('dashboard.blogs.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Create New Blog
                    </a>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-body">
                    @if($blogs->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Published Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>
                                                @if($blog->featured_image)
                                                    <img src="{{ asset('storage/'.$blog->featured_image) }}" 
                                                         alt="{{ $blog->title }}" 
                                                         class="img-thumbnail mr-2" 
                                                         style="width: 50px; height: 50px; object-fit: cover;">
                                                @endif
                                                {{ $blog->title }}
                                            </td>
                                            <td>
                                                <span class="badge 
                                                    {{ $blog->status == 'published' ? 'badge-success' : 'badge-warning' }}">
                                                    {{ ucfirst($blog->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $blog->formatted_published_date }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('dashboard.blogs.edit', $blog) }}" 
                                                       class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('dashboard.blogs.destroy', $blog) }}" 
                                                          method="POST" 
                                                          onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-outline-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $blogs->links('pagination::bootstrap-5') }}
                    @else
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            You haven't created any blogs yet. 
                            <a href="{{ route('dashboard.blogs.create') }}" class="alert-link">Create your first blog</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</main>

@push('styles')
<style>
    .blogs-management .table img {
        vertical-align: middle;
        margin-right: 10px;
    }
</style>
@endpush
</body>
</html>
