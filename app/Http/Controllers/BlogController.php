<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('author_id', Auth::id())
            ->latest()
            ->paginate(10);
        return view('dashboard.blogs', compact('blogs'));
    }

    public function create()
    {
        return view('dashboard.create-blog');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'in:draft,published',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('blog_images', 'public');
        }

        $blog = Blog::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'author_id' => Auth::id(),
            'featured_image' => $imagePath,
            'slug' => Str::slug($validatedData['title']),
            'status' => $validatedData['status'] ?? 'draft',
            'published_at' => $validatedData['status'] === 'published' ? now() : null,
        ]);

        return redirect()->route('dashboard.blogs')
            ->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        // Ensure the user can only edit their own blogs
        $this->authorize('update', $blog);

        return view('dashboard.edit-blog', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $this->authorize('update', $blog);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'in:draft,published',
        ]);

        // Handle image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $imagePath = $request->file('featured_image')->store('blog_images', 'public');
            $blog->featured_image = $imagePath;
        }

        $blog->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'slug' => Str::slug($validatedData['title']),
            'status' => $validatedData['status'] ?? 'draft',
            'published_at' => $validatedData['status'] === 'published' ? now() : null,
        ]);

        return redirect()->route('dashboard.blogs')
            ->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);

        // Delete featured image
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }

        $blog->delete();

        return redirect()->route('dashboard.blogs')
            ->with('success', 'Blog deleted successfully.');
    }

    /**
     * Display a listing of blog posts
     *
     * @return \Illuminate\View\View
     */
    public function blogIndex()
    {
        $blogs = Blog::published()
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('blog.index', compact('blogs'));
    }

    /**
     * Display an individual blog post
     *
     * @param \App\Models\Blog $blog
     * @return \Illuminate\View\View
     */
    public function show(Blog $blog)
    {
        // Ensure only published blogs can be viewed
        if ($blog->status !== 'published') {
            abort(404);
        }

        // Get related blogs (same author, published)
        $relatedBlogs = Blog::published()
            ->where('author_id', $blog->author_id)
            ->where('id', '!=', $blog->id)
            ->take(3)
            ->get();

        return view('blog.show', compact('blog', 'relatedBlogs'));
    }

    /**
     * Static method to fetch blogs for the landing page
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getLandingPageBlogs()
    {
        return Blog::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
    }

    /**
     * Static method to fetch advertisements for the landing page
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getLandingPageAdvertisements()
    {
        return Advertisement::active()
            ->where('position', 'homepage')
            ->whereNull('deleted_at')
            // Fallback to created_at if priority column is missing
            ->orderBy(
                Schema::hasColumn('advertisements', 'priority') ? 'priority' : 'created_at', 
                'desc'
            )
            ->take(3)
            ->get();
    }
}
