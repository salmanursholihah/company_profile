@extends('layouts.admin')

@section('title', 'Tambah Vendor')

@section('content')
<div class="max-w-3xl mx-auto p-4 bg-white rounded-xl shadow">
    <h1 class="text-xl font-bold mb-4">Tambah Vendor</h1>

    <form action="{{ route('admin.vendors.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded-lg px-3 py-2">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded-lg px-3 py-2">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Kontak</label>
            <input type="text" name="kontak" value="{{ old('kontak') }}" class="w-full border rounded-lg px-3 py-2">
            @error('kontak') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat') }}" class="w-full border rounded-lg px-3 py-2">
            @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Jumlah Produk</label>
            <input type="number" name="jumlah_product" value="{{ old('jumlah_product', 0) }}" class="w-full border rounded-lg px-3 py-2">
            @error('jumlah_product') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border rounded-lg px-3 py-2">
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.vendors.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
    </form>
</div>
@endsection
