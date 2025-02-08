<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    // Display a listing of blogs
    public function index()
    {
        $blogs = Blogs::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    // Show the form for creating a new blog
    public function create()
    {
        return view('admin.blogs.create');
    }

    // Store a newly created blog in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'blog_title' => 'string|required|max:50',
            'blog_description' => 'string|required|max:2048',
            'blog_link' => 'string|required|max:2048|url',
            'blog_image' => 'image|required',
        ]);

        $image_file = $request->file('blog_image');
        $image = base64_encode(file_get_contents($image_file->getRealPath()));

        Blogs::create([
            'blog_title' => $validated['blog_title'],
            'blog_description' => $validated['blog_description'],
            'blog_link' => $validated['blog_link'],
            'blog_image' => $image,
            'blog_created_date' => now()->toDateString(), // Set current date
        ]);

        return redirect()->route('adminblogs.index')->with('success', 'Blog created successfully');
    }

    // Display the specified blog
    public function show(Blogs $blog)
    {
        $blog = Blogs::findOrFail($blog->id);
        $recentBlogs = Blogs::latest()->take(5)->get();
        return view('admin.blogs.show', compact('blog', 'recentBlogs'));
    }

    // Show the form for editing the specified blog
    public function edit(Blogs $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    // Update the specified blog in the database
    public function update(Request $request, Blogs $blog)
    {
        $validated = $request->validate([
            'blog_title' => 'string|required|max:30',
            'blog_description' => 'string|required|max:2048',
            'blog_link' => 'string|required|max:2048',
            'blog_image' => 'image|nullable',
        ]);

        if ($request->hasFile('blog_image')) {
            $image_file = $request->file('blog_image');
            $image = base64_encode(file_get_contents($image_file->getRealPath()));
            $blog->blog_image = $image;
        }

        $blog->update([
            'blog_title' => $validated['blog_title'],
            'blog_description' => $validated['blog_description'],
            'blog_link' => $validated['blog_link'],
            'blog_image' => $blog->blog_image ?? $blog->getOriginal('blog_image'),
        ]);

        return redirect()->route('adminblogs.index')->with('success', 'Blog updated successfully');
    }

    // Remove the specified blog from the database
    public function destroy(Blogs $blog)
    {
        $blog->delete();
        return redirect()->route('adminblogs.index')->with('success', 'Blog deleted successfully');
    }
}
