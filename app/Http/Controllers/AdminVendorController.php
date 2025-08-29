<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class AdminVendorController extends Controller
{
  
    public function index()
    {
        $vendors = Vendor::paginate(10);
        return view('admin.vendors.index', compact('vendors'));
    }

    public function create()
    {
        return view('admin.vendors.create');

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email',
            'kontak' => 'nullable|string',
            'alamat' => 'nullable|string',
            'jumlah_product' => 'nullable|integer',
            'status' => 'required|in:aktif,nonaktif,pending',
        ]);

        Vendor::create($data);

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor berhasil ditambahkan');
    }

    public function edit(Vendor $vendor)
    {
        return view('admin.vendors.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:vendors,email,{$vendor->id}",
            'kontak' => 'nullable|string',
            'alamat' => 'nullable|string',
            'jumlah_product' => 'nullable|integer',
            'status' => 'required|in:aktif,nonaktif,pending',
        ]);

        $vendor->update($data);

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor berhasil diupdate');
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('admin.vendors.index')->with('success', 'Vendor berhasil dihapus');
    }
}


