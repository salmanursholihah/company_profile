@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6">Tambah Produk Baru</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium mb-1">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name') }}" 
                class="w-full border rounded-lg px-3 py-2 @error('name') border-red-500 @enderror">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Kategori</label>
            <select name="kategori" class="w-full border rounded-lg px-3 py-2">
                <option value="">-- Pilih Kategori --</option>
                <option value="Elektronik" {{ old('kategori')=='Elektronik' ? 'selected' : '' }}>Elektronik</option>
                <option value="Pakaian" {{ old('kategori')=='Pakaian' ? 'selected' : '' }}>Pakaian</option>
                <option value="Alat Rumah" {{ old('kategori')=='Alat Rumah' ? 'selected' : '' }}>Alat Rumah</option>
                <option value="sparepart" {{ old('kategori')=='sparepart' ? 'selected' : '' }}>sparepart</option>
            </select>
            @error('kategori') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4" 
                class="w-full border rounded-lg px-3 py-2 @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
            @error('deskripsi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">Harga</label>
                <input type="number" name="price" value="{{ old('price') }}" 
                    class="w-full border rounded-lg px-3 py-2 @error('price') border-red-500 @enderror">
                @error('price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block font-medium mb-1">Discount (%)</label>
                <input type="number" name="discount" value="{{ old('discount') }}" 
                    class="w-full border rounded-lg px-3 py-2">
            </div>
        </div>

        <div>
            <label class="block font-medium mb-1">Stok</label>
            <input type="number" name="stok" value="{{ old('stok') }}" 
                class="w-full border rounded-lg px-3 py-2 @error('stok') border-red-500 @enderror">
            @error('stok') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Lokasi</label>
            <input type="text" name="lokasi" value="{{ old('lokasi') }}" 
                class="w-full border rounded-lg px-3 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">Status</label>
            <select name="status" class="w-full border rounded-lg px-3 py-2">
                <option value="Aktif" {{ old('status')=='Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Nonaktif" {{ old('status')=='Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Gambar</label>
            <input type="file" name="image" class="w-full border rounded-lg px-3 py-2">
        </div>

        <div class="flex gap-2 mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection
