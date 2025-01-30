@extends('dashboard.seller-dashboard')

@section('dashboard-content')
<div class="container-fluid edit-blog">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Blog</h3>
                </div>
                
                <form action="{{ route('dashboard.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Blog Title</label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $blog->title) }}" 
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
                                placeholder="Write your blog content here">{{ old('content', $blog->content) }}</textarea>
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
                                <label class="custom-file-label" for="featured_image">
                                    {{ $blog->featured_image ? basename($blog->featured_image) : 'Choose image' }}
                                </label>
                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            @if($blog->featured_image)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/'.$blog->featured_image) }}" 
                                         alt="{{ $blog->title }}" 
                                         class="img-fluid" 
                                         style="max-height: 300px;">
                                    <small class="form-text text-muted">Current featured image</small>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="status">Blog Status</label>
                            <select 
                                class="form-control @error('status') is-invalid @enderror" 
                                id="status" 
                                name="status" 
                                required>
                                <option value="draft" {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Blog Information</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Created At:</strong> {{ $blog->created_at->format('F d, Y H:i') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Last Updated:</strong> {{ $blog->updated_at->format('F d, Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Blog
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
@endsection

@push('scripts')
<script>
    // Custom file input label
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endpush
