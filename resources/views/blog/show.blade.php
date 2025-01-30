<x-app-layout>
    <x-slot name="title">{{ $blog->title }}</x-slot>

    @push('styles')
    <style>
        .blog-single {
            padding: 4rem 2rem;
            background-color: #f8f9fa;
        }

        .blog-header {
            max-width: 800px;
            margin: 0 auto 2rem;
            text-align: center;
        }

        .blog-featured-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .blog-content {
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
            color: #333;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .related-blogs {
            background-color: white;
            padding: 3rem 2rem;
            margin-top: 3rem;
        }

        .related-blogs h3 {
            text-align: center;
            margin-bottom: 2rem;
        }

        .related-blogs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .related-blog-card {
            background: #f8f9fa;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .related-blog-card:hover {
            transform: translateY(-5px);
        }

        .related-blog-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .related-blog-content {
            padding: 1rem;
        }

        .related-blog-title {
            font-size: 1rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .related-blog-link {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
    @endpush

    <section class="blog-single">
        <article>
            <div class="blog-header">
                <h1>{{ $blog->title }}</h1>
                <div class="blog-meta">
                    <span>Published on {{ $blog->formatted_published_date }}</span>
                    <span>By {{ $blog->author->name }}</span>
                </div>
            </div>

            @if($blog->featured_image)
                <img src="{{ $blog->featured_image_url }}" 
                     alt="{{ $blog->title }}" 
                     class="blog-featured-image">
            @endif

            <div class="blog-content">
                {!! $blog->content !!}
            </div>
        </article>

        @if($relatedBlogs->count() > 0)
            <section class="related-blogs">
                <h3>Related Blogs</h3>
                <div class="related-blogs-grid">
                    @foreach($relatedBlogs as $relatedBlog)
                        <div class="related-blog-card">
                            <img src="{{ $relatedBlog->featured_image_url ?? asset('default-blog-image.jpg') }}" 
                                 alt="{{ $relatedBlog->title }}" 
                                 class="related-blog-image">
                            <div class="related-blog-content">
                                <h4 class="related-blog-title">{{ $relatedBlog->title }}</h4>
                                <a href="{{ route('blog.show', $relatedBlog->slug) }}" class="related-blog-link">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </section>
</x-app-layout>
