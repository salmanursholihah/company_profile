<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'category'=> 'required',
            'author'  => 'required',
            'content' => 'required',
            'image'   => 'nullable|image',
        ]);

        $slug = Str::slug($request->title);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('blogs', 'public');
        }

        Blog::create([
            'title'        => $request->title,
            'slug'         => $slug,
            'category'     => $request->category,
            'author'       => $request->author,
            'content'      => $request->content,
            'image'        => $image,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'   => 'required',
            'category'=> 'required',
            'author'  => 'required',
            'content' => 'required',
            'image'   => 'nullable|image',
        ]);

        $slug = Str::slug($request->title);

        $image = $blog->image;
        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(storage_path('app/public/' . $blog->image))) {
                unlink(storage_path('app/public/' . $blog->image));
            }
            $image = $request->file('image')->store('blogs', 'public');
        }

        $blog->update([
            'title'        => $request->title,
            'slug'         => $slug,
            'category'     => $request->category,
            'author'       => $request->author,
            'content'      => $request->content,
            'image'        => $image,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image && file_exists(storage_path('app/public/' . $blog->image))) {
            unlink(storage_path('app/public/' . $blog->image));
        }

        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
