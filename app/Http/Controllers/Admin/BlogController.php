<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts
     */
    public function index()
    {
        $posts = BlogPost::latest('published_at')->paginate(15);
        return view('admin.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new blog post
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created blog post
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'author' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'max:2048'],
            'published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blog', 'public');
        }

        if (!isset($validated['published_at']) && $validated['published']) {
            $validated['published_at'] = now();
        }

        BlogPost::create($validated);
        
        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully.');
    }

    /**
     * Show the form for editing the specified blog post
     */
    public function edit(BlogPost $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified blog post
     */
    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'author' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'max:2048'],
            'published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $validated['image'] = $request->file('image')->store('blog', 'public');
        }

        if (!isset($validated['published_at']) && $validated['published']) {
            $validated['published_at'] = now();
        }

        $blog->update($validated);
        
        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified blog post
     */
    public function destroy(BlogPost $blog)
    {
        // Delete image if exists
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        
        $blog->delete();
        
        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully.');
    }

    /**
     * Toggle publish status
     */
    public function togglePublish(BlogPost $blog)
    {
        $blog->update([
            'published' => !$blog->published,
            'published_at' => !$blog->published ? now() : $blog->published_at
        ]);
        
        return back()->with('success', 'Post status updated.');
    }
}
