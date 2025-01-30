<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(12);
        return view('dashboard.blogs', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create-blog');
    }

    /**
     * Store a newly created blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
            'is_featured' => 'boolean',
        ]);

        // Generate a unique slug
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        $validated['slug'] = $slug;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Set author_id
        $validated['author_id'] = Auth::id();

        $blog = Blog::create($validated);

        return redirect()->route('dashboard.blogs')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Show the form for editing the specified blog.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('dashboard.create-blog', compact('blog'));
    }

    /**
     * Update the specified blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image_path) {
                Storage::disk('public')->delete($blog->image_path);
            }

            $imagePath = $request->file('image')->store('blogs', 'public');
            $validated['image_path'] = $imagePath;
        }

        $blog->update($validated);

        return redirect()->route('dashboard.blogs')
            ->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified blog from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        // Delete image if exists
        if ($blog->image_path) {
            Storage::disk('public')->delete($blog->image_path);
        }

        $blog->delete();

        return redirect()->route('dashboard.blogs')
            ->with('success', 'Blog deleted successfully.');
    }
}