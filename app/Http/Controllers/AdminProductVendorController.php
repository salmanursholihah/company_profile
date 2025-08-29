<?php

namespace App\Http\Controllers;

use App\Models\ProductVendor;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductVendorController extends Controller
{
    // List produk vendor
    public function index(Request $request)
    {
        $query = ProductVendor::with('vendor');

        // Filter kategori
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Pencarian nama produk
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Ambil data dengan pagination
        $productvendors = $query->latest()->paginate(10);

        // Ambil semua vendor untuk filter dropdown
        $vendors = Vendor::all();

        return view('admin.product_vendor.index', compact('productvendors', 'vendors'));
    }

    // Form tambah produk
    public function create()
    {
        $vendors = Vendor::all();
        return view('admin.product_vendor.create', compact('vendors'));
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        ProductVendor::create($data);

        return redirect()->route('admin.product_vendor.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Form edit produk
    public function edit(ProductVendor $product_vendor)
    {
        $vendors = Vendor::all();
        return view('admin.product_vendor.edit', compact('product_vendor', 'vendors'));
    }

    // Update produk
    public function update(Request $request, ProductVendor $product_vendor)
    {
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product_vendor->update($data);

        return redirect()->route('admin.product_vendor.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Hapus produk
    public function destroy(ProductVendor $product_vendor)
    {
        $product_vendor->delete();
        return redirect()->route('admin.product_vendor.index')->with('success', 'Produk berhasil dihapus!');
    }
}
