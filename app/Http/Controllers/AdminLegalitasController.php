<?php

namespace App\Http\Controllers;

use App\Models\Legalitas;
use App\Http\Requests\LegalitasRequest;

class AdminLegalitasController extends Controller
{
    public function index()
    {
        $legalitas = Legalitas::orderBy('urutan')->get();
        return view('admin.legalitas.index', compact('legalitas'));
    }

    public function create()
    {
        return view('admin.legalitas.create');
    }

    public function store(LegalitasRequest $request)
    {
        $data = $request->validated();

        // Upload image
        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads/legalitas'), $filename);
            $data['image'] = $filename;
        }

        Legalitas::create($data);

        return redirect()->route('admin.legalitas.index')
            ->with('success', 'Legalitas berhasil ditambahkan.');
    }

    public function edit(Legalitas $legalitas)
    {
        return view('admin.legalitas.edit', compact('legalitas'));
    }

    public function update(LegalitasRequest $request, Legalitas $legalitas)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            // Delete old image
            if ($legalitas->image && file_exists(public_path('uploads/legalitas/' . $legalitas->image))) {
                unlink(public_path('uploads/legalitas/' . $legalitas->image));
            }

            // Upload new image
            $file     = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads/legalitas'), $filename);
            $data['image'] = $filename;
        }

        $legalitas->update($data);

        return redirect()->route('admin.legalitas.index')
            ->with('success', 'Legalitas berhasil diperbarui.');
    }

    public function destroy(Legalitas $legalitas)
    {
        if ($legalitas->image && file_exists(public_path('uploads/legalitas/' . $legalitas->image))) {
            unlink(public_path('uploads/legalitas/' . $legalitas->image));
        }

        $legalitas->delete();

        return redirect()->route('admin.legalitas.index')
            ->with('success', 'Legalitas berhasil dihapus.');
    }
}
