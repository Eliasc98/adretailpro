<x-app-layout>
    <x-slot name="title">Blog</x-slot>

    @push('styles')
    <style>
        .blog-index {
            padding: 4rem 2rem;
            background-color: #f8f9fa;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .blog-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            overflow: hidden;
        }

        .blog-card:hover {
            transform: translateY(-5px);
        }

        .blog-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .blog-content {
            padding: 1.5rem;
        }

        .blog-title {
            font-size: 1.25rem;
            color: #333;
            margin-bottom: 0.75rem;
        }

        .blog-excerpt {
            color: #666;
            margin-bottom: 1rem;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.875rem;
            color: #6c757d;
        }

        .blog-link {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }
    </style>
    @endpush

    <section class="blog-index">
        <div class="container">
            <h1 class="text-center mb-5">Our Latest Blogs</h1>

            <div class="blog-grid">
                @forelse($blogs as $blog)
                    <div class="blog-card">
                        <img src="{{ $blog->featured_image_url ?? asset('default-blog-image.jpg') }}" 
                             alt="{{ $blog->title }}" 
                             class="blog-image">
                        <div class="blog-content">
                            <h3 class="blog-title">{{ $blog->title }}</h3>
                            <p class="blog-excerpt">{{ $blog->excerpt }}</p>
                            <div class="blog-meta">
                                <span>{{ $blog->formatted_published_date }}</span>
                                <a href="{{ route('blog.show', $blog->slug) }}" class="blog-link">Read More</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="alert alert-info">No blog posts available at the moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="pagination">
                {{ $blogs->links() }}
            </div>
        </div>
    </section>
</x-app-layout>
