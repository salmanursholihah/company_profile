<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'headline' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $imagePath = $request->file('image')->store('uploads/about', 'public');

        About::create([
            'headline' => $request->headline,
            'sub_headline' => $request->sub_headline,
            'description' => $request->description,
            'url' => $request->url,
            'image' => 'storage/' . $imagePath
        ]);

        return redirect()->route('admin.about.index')->with('success', 'Konten berhasil dibuat.');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $request->validate([
            'headline' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = [
            'headline' => $request->headline,
            'sub_headline' => $request->sub_headline,
            'description' => $request->description,
            'url' => $request->url,
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/about', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }

        $about->update($data);

        return redirect()->route('admin.about.index')->with('success', 'Konten berhasil diperbarui.');
    }
}
