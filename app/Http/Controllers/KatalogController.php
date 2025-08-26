<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;

class KatalogController extends Controller{
    // Halaman publik e-katalog
    public function index()
    {
        // ambil semua katalog
        $products = Katalog::all();

        // ambil daftar company unik dari katalog
        $companies = Katalog::select('company')->distinct()->pluck('company');

        return view('e-katalog', compact('products', 'companies'));
    }

    // CRUD untuk admin tetap sama
    public function create()
    {
        return view('admin.katalogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'company' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('katalogs', 'public');
        }

        Katalog::create($data);

        return redirect()->route('admin.katalogs.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Katalog $katalog)
    {
        return view('admin.katalogs.edit', compact('katalog'));
    }

    public function update(Request $request, Katalog $katalog)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'company' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('katalogs', 'public');
        }

        $katalog->update($data);

        return redirect()->route('admin.katalogs.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Katalog $katalog)
    {
        $katalog->delete();
        return redirect()->route('admin.katalogs.index')->with('success', 'Produk berhasil dihapus');
    }
}
