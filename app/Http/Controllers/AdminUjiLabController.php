<?php

namespace App\Http\Controllers;

use App\Models\HasilUjiLab;
use Illuminate\Http\Request;

class AdminUjiLabController extends Controller
{
    public function index()
    {
        $data = HasilUjiLab::latest()->get();
        return view('admin.uji_lab.index', compact('data'));
    }

    public function create()
    {
        return view('admin.uji_lab.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'poin1' => 'nullable|string',
            'poin2' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/hasil_uji_lab'), $name);
            $data['gambar'] = 'uploads/hasil_uji_lab/'.$name;
        }

        HasilUjiLab::create($data);

        return redirect()->route('admin.hasil-uji-lab.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = HasilUjiLab::findOrFail($id);
        return view('admin.uji_lab.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = HasilUjiLab::findOrFail($id);

        $request->validate([
            'judul' => 'nullable|string|max:255',
            'poin1' => 'nullable|string',
            'poin2' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $updateData = $request->all();

        if ($request->hasFile('gambar')) {

            if ($data->gambar && file_exists(public_path($data->gambar))) {
                unlink(public_path($data->gambar));
            }

            $file = $request->file('gambar');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/hasil_uji_lab'), $name);

            $updateData['gambar'] = 'uploads/hasil_uji_lab/'.$name;
        }

        $data->update($updateData);

        return redirect()->route('admin.hasil-uji-lab.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = HasilUjiLab::findOrFail($id);

        if ($data->gambar && file_exists(public_path($data->gambar))) {
            unlink(public_path($data->gambar));
        }

        $data->delete();

        return redirect()->route('admin.hasil-uji-lab.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
