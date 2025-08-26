<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Katalog;

class AdminkatalogController extends Controller
{
 
    public function index()
{
    $katalogs = Katalog::paginate(10); // tampilkan 10 data per halaman
    return view('admin.katalogs.index', compact('katalogs'));
}





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



