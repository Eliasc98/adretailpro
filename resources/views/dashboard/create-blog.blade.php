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
        <main class="dashboard-main">
<div class="container-fluid create-blog">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create New Blog</h3>
                </div>
                
                <form action="{{ route('dashboard.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Blog Title</label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}" 
                                   required 
                                   placeholder="Enter blog title">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Blog Content</label>
                            <textarea 
                                class="form-control @error('content') is-invalid @enderror" 
                                id="content" 
                                name="content" 
                                rows="10" 
                                required 
                                placeholder="Write your blog content here">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="featured_image">Featured Image</label>
                            <div class="custom-file">
                                <input type="file" 
                                       class="custom-file-input @error('featured_image') is-invalid @enderror" 
                                       id="featured_image" 
                                       name="featured_image" 
                                       accept="image/*">
                                <label class="custom-file-label" for="featured_image">Choose image</label>
                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                Optional. Recommended image size: 1200x630 pixels
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="status">Blog Status</label>
                            <select 
                                class="form-control @error('status') is-invalid @enderror" 
                                id="status" 
                                name="status" 
                                required>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Create Blog
                        </button>
                        <a href="{{ route('dashboard.blogs') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>

@push('scripts')
<script>
    // Custom file input label
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endpush

</body>
</html>
