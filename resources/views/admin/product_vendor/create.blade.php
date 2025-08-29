@extends('layouts.admin')

@section('title', 'Tambah Produk Vendor')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-semibold mb-6">Tambah Produk Vendor</h1>

    <form action="{{ route('admin.product_vendor.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded-xl shadow space-y-4">
        @csrf

        <!-- Pilih Vendor -->
        <div>
            <label for="vendor_id" class="block font-medium mb-1">Vendor</label>
            <select name="vendor_id" class="border rounded-lg px-3 py-2 w-full">
                <option value="">Pilih Vendor</option>
                @foreach($vendors as $vendor)
                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                @endforeach
            </select>
            @error('vendor_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nama Produk -->
        <div>
            <label for="name" class="block font-medium mb-1">Nama Produk</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="border rounded-lg w-full px-3 py-2">
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kategori -->
        <div>
            <label for="category" class="block font-medium mb-1">Kategori</label>
            <select name="category" id="category" class="border rounded-lg w-full px-3 py-2">
                <option value="">Pilih Kategori</option>
                <option value="Elektronik" {{ old('category') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                <option value="Pakaian" {{ old('category') == 'Pakaian' ? 'selected' : '' }}>Pakaian</option>
                <option value="Alat Rumah" {{ old('category') == 'Alat Rumah' ? 'selected' : '' }}>Alat Rumah</option>
            </select>
            @error('category')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="description" class="block font-medium mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="4"
                class="border rounded-lg w-full px-3 py-2">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Harga -->
        <div>
            <label for="price" class="block font-medium mb-1">Harga (Rp)</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}"
                class="border rounded-lg w-full px-3 py-2">
            @error('price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Stok -->
        <div>
            <label for="stock" class="block font-medium mb-1">Stok</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                class="border rounded-lg w-full px-3 py-2">
            @error('stock')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gambar Produk -->
        <div>
            <label for="image" class="block font-medium mb-1">Gambar Produk</label>
            <input type="file" name="image" id="image" class="border rounded-lg w-full px-3 py-2">
            @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Submit -->
        <div class="pt-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan
                Produk</button>
            <a href="{{ route('admin.product_vendor.index') }}"
                class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 ml-2">Kembali</a>
        </div>
    </form>

</div>
@endsection