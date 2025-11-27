<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'stok' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Only take the fields we expect to avoid mass-assignment issues
        $data = $request->only([
            'name', 'kategori', 'deskripsi', 'price', 'discount', 'stok', 'lokasi', 'status'
        ]);

        if ($request->hasFile('image')) {
            // store on the public disk under "products" directory
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'price' => 'required',
            'discount' => 'nullable|numeric',
            'stok' => 'required|integer',
            'lokasi' => 'required',
            'status' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus');
    }
}


