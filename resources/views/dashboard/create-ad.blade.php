<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($advertisement) ? 'Edit Advertisement' : 'Create Advertisement' }} - AdRetail Pro</title>
    
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
            <section class="dashboard-section" id="create-ad">
                <div class="section-header">
                    <h2>{{ isset($advertisement) ? 'Edit Advertisement' : 'Create New Advertisement' }}</h2>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form 
                    action="{{ isset($advertisement) ? route('dashboard.advertisements.update', $advertisement) : route('dashboard.advertisements.store') }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                    class="create-ad-form"
                >
                    @csrf
                    @if(isset($advertisement))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <label for="title" class="form-label">Advertisement Title</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="title" 
                                    name="title" 
                                    value="{{ old('title', $advertisement->title ?? '') }}" 
                                    required
                                >
                            </div>

                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea 
                                    class="form-control" 
                                    id="description" 
                                    name="description" 
                                    rows="4"
                                >{{ old('description', $advertisement->description ?? '') }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="link" class="form-label">Advertisement Link (Optional)</label>
                                <input 
                                    type="url" 
                                    class="form-control" 
                                    id="link" 
                                    name="link" 
                                    value="{{ old('link', $advertisement->link ?? '') }}"
                                >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">
                                    Advertisement Image 
                                    @if(isset($advertisement) && $advertisement->image_path)
                                        <small>(Current image will be replaced)</small>
                                    @endif
                                </label>
                                <input 
                                    type="file" 
                                    class="form-control" 
                                    id="image" 
                                    name="image" 
                                    accept="image/*"
                                    {{ isset($advertisement) ? '' : 'required' }}
                                >
                                @if(isset($advertisement) && $advertisement->image_path)
                                    <div class="mt-2">
                                        <img 
                                            src="{{ asset('storage/'.$advertisement->image_path) }}" 
                                            alt="{{ $advertisement->title }}" 
                                            class="img-fluid rounded"
                                        >
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="position" class="form-label">Advertisement Position</label>
                                <select 
                                    class="form-control" 
                                    id="position" 
                                    name="position" 
                                    required
                                >
                                    <option value="homepage" 
                                        {{ (old('position', $advertisement->position ?? '') == 'homepage') ? 'selected' : '' }}>
                                        Homepage
                                    </option>
                                    <option value="sidebar" 
                                        {{ (old('position', $advertisement->position ?? '') == 'sidebar') ? 'selected' : '' }}>
                                        Sidebar
                                    </option>
                                    <option value="footer" 
                                        {{ (old('position', $advertisement->position ?? '') == 'footer') ? 'selected' : '' }}>
                                        Footer
                                    </option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input 
                                        type="date" 
                                        class="form-control" 
                                        id="start_date" 
                                        name="start_date" 
                                        value="{{ old('start_date', isset($advertisement) && $advertisement->start_date ? $advertisement->start_date->format('Y-m-d') : '') }}"
                                    >
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input 
                                        type="date" 
                                        class="form-control" 
                                        id="end_date" 
                                        name="end_date" 
                                        value="{{ old('end_date', isset($advertisement) && $advertisement->end_date ? $advertisement->end_date->format('Y-m-d') : '') }}"
                                    >
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input 
                                        type="checkbox" 
                                        class="form-check-input" 
                                        id="is_active" 
                                        name="is_active" 
                                        value="1"
                                        {{ old('is_active', $advertisement->is_active ?? false) ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="is_active">
                                        Is Advertisement Active?
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> 
                            {{ isset($advertisement) ? 'Update Advertisement' : 'Create Advertisement' }}
                        </button>
                        <a href="{{ route('dashboard.advertisements') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <style>
        .create-ad-form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</body>
</html>