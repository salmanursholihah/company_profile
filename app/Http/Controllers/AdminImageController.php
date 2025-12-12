<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminImageController extends Controller
{
    public function index()
    {
        $images = Image::latest()->get();
        return view('admin.images.index', compact('images'));
    }

    public function create()
    {
        return view('admin.images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $path = $request->file('image')->store('images', 'public');

        Image::create([
            'title' => $request->image->getClientOriginalName(),
            'image_path' => $path,
        ]);

        return redirect()->route('admin.images.index')->with('success', 'Image berhasil ditambahkan');
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('admin.images.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4089',
        ]);

        // Jika upload gambar baru
        if ($request->hasFile('image')) {

            // hapus gambar lama
            if ($image->path && Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }

            $path = $request->file('image')->store('images', 'public');
            $image->update([
                'title' => $request->image->getClientOriginalName(),
                'image_path' => $path,
            ]);
        }

        return redirect()->route('admin.images.index')->with('success', 'Image berhasil diupdate');
    }

    // public function destroy($id)
    // {
    //     $image = Image::findOrFail($id);

    //     // hapus file fisik
    //     if (Storage::disk('public')->exists($image->path)) {
    //         Storage::disk('public')->delete($image->path);
    //     }

    //     // hapus database
    //     $image->delete();

    //     return redirect()->route('admin.images.index')->with('success', 'Image berhasil dihapus');
    // }
    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        // Hapus file fisik
        Storage::disk('public')->delete($image->image_path);

        // Hapus row database
        $image->delete();

        return redirect()->route('admin.images.index')->with('success', 'Gambar berhasil dihapus');
    }
}
