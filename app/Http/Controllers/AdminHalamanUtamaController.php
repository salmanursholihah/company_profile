<?php

namespace App\Http\Controllers;

use App\Models\HalamanUtama;
use Illuminate\Http\Request;

class AdminHalamanUtamaController extends Controller
{
    public function index()
    {
        $halaman_utamas = HalamanUtama::all();
        return view('admin.halaman_utama.index', compact('halaman_utamas'));
    }

    public function create()
    {
        return view('admin.halaman_utama.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'headline' => 'required',
            'sub_headline' => 'nullable',
            'url' => 'nullable|url',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp'
        ]);

        $imagePath = $request->image->store('uploads/halaman_utama', 'public');

        HalamanUtama::create([
            'headline' => $request->headline,
            'sub_headline' => $request->sub_headline,
            'url' => $request->url,
            'image' => 'storage/' . $imagePath
        ]);

        return redirect()->route('admin.halaman_utama.index')
                        ->with('success', 'Data berhasil ditambahkan.');
    }

   
    public function edit($id)
{
    $halaman_utama = HalamanUtama::findOrFail($id);
    return view('admin.halaman_utama.edit', compact('halaman_utama'));
}


    public function update(Request $request, $id)
    {
        $halaman_utama = HalamanUtama::findOrFail($id);

        $request->validate([
            'headline' => 'required',
            'sub_headline' => 'nullable',
            'url' => 'nullable|url',
            'image' => 'image|mimes:jpg,png,jpeg,webp'
        ]);

        $data = [
            'headline' => $request->headline,
            'sub_headline' => $request->sub_headline,
            'url' => $request->url,
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->image->store('uploads/halaman_utama', 'public');
            $data['image'] = 'storage/' . $imagePath;
        }

        $halaman_utama->update($data);

        return redirect()->route('admin.halaman_utama.index')
                        ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $halaman_utama = HalamanUtama::findOrFail($id);
        $halaman_utama->delete();

        return redirect()->route('admin.halaman_utama.index')
                        ->with('success', 'Data berhasil dihapus.');
    }
}
