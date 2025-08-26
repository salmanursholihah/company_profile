@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6">Edit Produk</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" 
                class="w-full border rounded-lg px-3 py-2 @error('name') border-red-500 @enderror">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Kategori</label>
            <select name="kategori" class="w-full border rounded-lg px-3 py-2">
                <option value="Elektronik" {{ $product->kategori=='Elektronik' ? 'selected' : '' }}>Elektronik</option>
                <option value="Pakaian" {{ $product->kategori=='Pakaian' ? 'selected' : '' }}>Pakaian</option>
                <option value="Alat Rumah" {{ $product->kategori=='Alat Rumah' ? 'selected' : '' }}>Alat Rumah</option>
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="w-full border rounded-lg px-3 py-2">{{ old('deskripsi', $product->deskripsi) }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">Harga</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" 
                    class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block font-medium mb-1">Discount (%)</label>
                <input type="number" name="discount" value="{{ old('discount', $product->discount) }}" 
                    class="w-full border rounded-lg px-3 py-2">
            </div>
        </div>

        <div>
            <label class="block font-medium mb-1">Stok</label>
            <input type="number" name="stok" value="{{ old('stok', $product->stok) }}" 
                class="w-full border rounded-lg px-3 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">Lokasi</label>
            <input type="text" name="lokasi" value="{{ old('lokasi', $product->lokasi) }}" 
                class="w-full border rounded-lg px-3 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">Status</label>
            <select name="status" class="w-full border rounded-lg px-3 py-2">
                <option value="Aktif" {{ $product->status=='Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Nonaktif" {{ $product->status=='Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Gambar</label>
            <input type="file" name="image" class="w-full border rounded-lg px-3 py-2">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" class="w-32 h-32 mt-2 object-cover rounded-lg">
            @endif
        </div>

        <div class="flex gap-2 mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection
