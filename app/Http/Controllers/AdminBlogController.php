<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    // Tampilkan semua blog di admin
    public function index()
    {
        $blogs = Blog::latest()->paginate(10); // 10 per halaman
        return view('admin.blogs.index', compact('blogs'));
    }

    // Form create
    public function create()
    {
        return view('admin.blogs.create');
    }

    // Simpan blog baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:blogs,slug',
            'category' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
    }

    // Lihat detail blog
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    // Form edit
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    // Update blog
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:blogs,slug,' . $blog->id,
            'category' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
    }

    // Hapus blog
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
    }
}

