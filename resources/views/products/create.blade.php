<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($product) ? 'Edit Product' : 'Create Product' }} - AdRetail Pro</title>
    
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
                
                <li>
                    <a href="{{ route('products.index') }}">
                        <i class="fas fa-box"></i>
                        <span>Manage Products</span>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('products.create') }}">
                        <i class="fas fa-plus"></i>
                        <span>Create Product</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-main">
            <section class="dashboard-section" id="create-product">
                <div class="section-header">
                    <h2>{{ isset($product) ? 'Edit Product' : 'Create New Product' }}</h2>
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
                    action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                    class="create-product-form"
                >
                    @csrf
                    @if(isset($product))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name', $product->name ?? '') }}" 
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
                                >{{ old('description', $product->description ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">
                                    Product Image 
                                    @if(isset($product) && $product->image_path)
                                        <small>(Current image will be replaced)</small>
                                    @endif
                                </label>
                                <input 
                                    type="file" 
                                    class="form-control" 
                                    id="image" 
                                    name="image" 
                                    accept="image/*"
                                    {{ isset($product) ? '' : 'required' }}
                                >
                                @if(isset($product) && $product->image_path)
                                    <div class="mt-2">
                                        <img 
                                            src="{{ asset('storage/'.$product->image_path) }}" 
                                            alt="{{ $product->name }}" 
                                            class="img-fluid rounded"
                                        >
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 form-group mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select 
                                class="form-control" 
                                id="category_id" 
                                name="category_id" 
                                required
                            >
                                @foreach($categories as $category)
                                    <option 
                                        value="{{ $category->id }}"
                                        {{ (old('category_id', $product->category_id ?? '') == $category->id) ? 'selected' : '' }}
                                    >
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 form-group mb-3">
                            <label for="price" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    id="price" 
                                    name="price" 
                                    step="0.01" 
                                    min="0"
                                    value="{{ old('price', $product->price ?? '') }}" 
                                    required
                                >
                            </div>
                        </div>

                        <div class="col-md-4 form-group mb-3">
                            <label for="stock" class="form-label">Stock Quantity</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="stock" 
                                name="stock" 
                                min="0"
                                value="{{ old('stock', $product->stock ?? '') }}" 
                                required
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="discount" class="form-label">Discount (%)</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="discount" 
                                name="discount" 
                                min="0" 
                                max="100"
                                value="{{ old('discount', $product->discount ?? '') }}"
                            >
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <div class="form-check mt-4">
                                <input 
                                    type="checkbox" 
                                    class="form-check-input" 
                                    id="featured" 
                                    name="featured" 
                                    value="1"
                                    {{ old('featured', $product->featured ?? false) ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="featured">
                                    Featured Product
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> 
                            {{ isset($product) ? 'Update Product' : 'Create Product' }}
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary ml-2">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <style>
        .create-product-form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</body>
</html>