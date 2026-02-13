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
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'type'  => 'required|string'
        ]);

        $path = $request->file('image')->store('images', 'public');

        Image::create([
            'title'      => $request->file('image')->getClientOriginalName(),
            'image_path' => $path,
            'type'       => $request->type, // ✅ TYPE MASUK
        ]);

        return redirect()->route('admin.images.index')
            ->with('success', 'Image berhasil ditambahkan');
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'type'  => 'required|string'
        ]);

        // Data update default (tanpa ganti gambar)
        $data = [
            'type' => $request->type // ✅ TYPE TETAP KE UPDATE
        ];

        // Jika upload gambar baru
        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }

            $path = $request->file('image')->store('images', 'public');

            $data['title'] = $request->file('image')->getClientOriginalName();
            $data['image_path'] = $path;
        }

        $image->update($data);

        return redirect()->route('admin.images.index')
            ->with('success', 'Image berhasil diupdate');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return redirect()->route('admin.images.index')
            ->with('success', 'Gambar berhasil dihapus');
    }
}
