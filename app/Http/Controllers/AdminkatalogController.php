<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'deskripsi' => 'required',
            'company'   => 'required',
            'image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('katalog', 'public');

        Katalog::create([
            'name'      => $request->name,
            'deskripsi' => $request->deskripsi,
            'company'   => $request->company,
            'image'     => $imagePath,
        ]);

        return redirect()->route('admin.katalogs.index')->with('success', 'Katalog berhasil ditambahkan');
    }

    public function edit(Katalog $katalog)
    {
        return view('admin.katalogs.edit', compact('katalog'));
    }

    public function update(Request $request, Katalog $katalog)
    {
        $request->validate([
            'name'      => 'required',
            'deskripsi' => 'required',
            'company'   => 'required',
            'image'     => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['name','deskripsi','company']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('katalog', 'public');
        }

        $katalog->update($data);

        return redirect()->route('admin.katalogs.index')->with('success', 'Katalog berhasil diperbarui');
    }

    public function destroy(Katalog $katalog)
    {
        $katalog->delete();
        return redirect()->route('admin.katalogs.index')->with('success', 'Katalog berhasil dihapus');
    }
  public function show(Katalog $katalog)
{
    return abort(404);
}

}
