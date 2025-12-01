<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class AdminVisiMisiController extends Controller
{
    public function index()
    {
        $items = VisiMisi::all();
        return view('admin.visi_misi.index', compact('items'));
    }

    public function create()
    {
        return view('admin.visi_misi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'nullable|string',
            'text' => 'required',
            'type' => 'required|in:visi,misi',
        ]);

        VisiMisi::create($request->all());

        return redirect()->route('admin.visi_misi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = VisiMisi::findOrFail($id);
        return view('admin.visi_misi.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'nullable|string',
            'text' => 'required',
            'type' => 'required|in:visi,misi',
        ]);

        $item = VisiMisi::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('admin.visi_misi.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = VisiMisi::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.visi_misi.index')->with('success', 'Data berhasil dihapus.');
    }
}
