<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminkatalogController extends Controller
{
    public function index()
    {
        $katalogs = Katalog::latest()->get();
        return view('admin.katalogs.index', compact('katalogs'));
    }

    public function create()
    {
        return view('admin.katalogs.create');
    }

    // ✅ STORE (CREATE DATA BARU)
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'preview_desc'   => 'nullable|string',
            'company'        => 'required|string|max:255',
            'kategori'       => 'nullable|string|max:255',
            'spesifikasi'    => 'nullable|string',
            'image'          => 'required|image|mimes:jpg,jpeg,png,webp|max:5000',
        ]);

        // Upload image
        $imagePath = $request->file('image')->store('katalog', 'public');

        Katalog::create([
            'name'          => $request->name,
            'deskripsi'     => $request->deskripsi,
            'preview_desc'  => $request->preview_desc,
            'company'       => $request->company,
            'kategori'      => $request->kategori,
            'spesifikasi'   => $request->spesifikasi,
            'kode_produk'   => $request->kode_produk,
            'brand'         => $request->brand,
            'model_produk'  => $request->model_produk,
            'seri_produk'   => $request->seri_produk,
            'image'         => $imagePath,
        ]);

        return redirect()
            ->route('admin.katalogs.index')
            ->with('success', 'Katalog berhasil ditambahkan');
    }

    public function edit(Katalog $katalog)
    {
        return view('admin.katalogs.edit', compact('katalog'));
    }

    // ✅ UPDATE DATA
    public function update(Request $request, Katalog $katalog)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'preview_desc'   => 'nullable|string',
            'company'        => 'required|string|max:255',
            'kategori'       => 'nullable|string|max:255',
            'spesifikasi'    => 'nullable|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5000',
            'kode_produk'   => 'nullable|string|max:100',
            'brand'         => 'nullable|string|max:255',
            'model_produk'  => 'nullable|string|max:255',
            'seri_produk'   => 'nullable|string|max:255',
        ]);

        $data = $request->only([
            'name',
            'deskripsi',
            'preview_desc',
            'company',
            'kategori',
            'spesifikasi',
            'kode_produk',
            'brand',
            'model_produk',
            'seri_produk',
        ]);

        // ✅ Kalau upload image baru
        if ($request->hasFile('image')) {

            // Hapus image lama
            if ($katalog->image && Storage::disk('public')->exists($katalog->image)) {
                Storage::disk('public')->delete($katalog->image);
            }

            // Upload image baru
            $data['image'] = $request->file('image')->store('katalog', 'public');
        }

        $katalog->update($data);

        return redirect()
            ->route('admin.katalogs.index')
            ->with('success', 'Katalog berhasil diperbarui');
    }

    public function destroy(Katalog $katalog)
    {
        // Hapus image juga
        if ($katalog->image && Storage::disk('public')->exists($katalog->image)) {
            Storage::disk('public')->delete($katalog->image);
        }

        $katalog->delete();

        return redirect()
            ->route('admin.katalogs.index')
            ->with('success', 'Katalog berhasil dihapus');
    }

    // ✅ UNTUK PREVIEW DETAIL PAGE
    public function show(Katalog $katalog)
    {
        return view('admin.katalogs.show', compact('katalog'));
    }
}
