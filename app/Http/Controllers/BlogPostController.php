<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::where('status', 'published')->get();
        return view('blog.index', compact('posts'));
    }

    // Show a single blog post
    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('blog.show', compact('post'));
    }

    // Create a new blog post (admin)
    public function create()
    {
        return view('blog.create');
    }

    // Store a new blog post (admin)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published,archived',
        ]);

        $post = new BlogPost();
        $post->title = $request->input('title');
        $post->slug = \Str::slug($request->input('title'));
        $post->content = $request->input('content');
        $post->excerpt = $request->input('excerpt');
        $post->meta_title = $request->input('meta_title');
        $post->meta_description = $request->input('meta_description');
        $post->status = $request->input('status');
        $post->published_at = $request->input('status') == 'published' ? now() : null;
        $post->save();

        return redirect()->route('blog.index')->with('success', 'Blog post created!');
    }

    // Edit a blog post (admin)
    public function edit($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        return view('blog.edit', compact('post'));
    }

    // Update a blog post (admin)
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published,archived',
        ]);

        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $post->title = $request->input('title');
        $post->slug = \Str::slug($request->input('title'));
        $post->content = $request->input('content');
        $post->excerpt = $request->input('excerpt');
        $post->meta_title = $request->input('meta_title');
        $post->meta_description = $request->input('meta_description');
        $post->status = $request->input('status');
        $post->published_at = $request->input('status') == 'published' ? now() : null;
        $post->save();

        return redirect()->route('blog.index')->with('success', 'Blog post updated!');
    }

    // Delete a blog post (admin)
    public function destroy($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Blog post deleted!');
    }
}
