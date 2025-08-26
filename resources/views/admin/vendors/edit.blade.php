@extends('layouts.admin')

@section('title', 'Edit Vendor')

@section('content')
<div class="max-w-3xl mx-auto p-4 bg-white rounded-xl shadow">
    <h1 class="text-xl font-bold mb-4">Edit Vendor</h1>

    <form action="{{ route('admin.vendors.update', $vendor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name', $vendor->name) }}" class="w-full border rounded-lg px-3 py-2">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $vendor->email) }}" class="w-full border rounded-lg px-3 py-2">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Kontak</label>
            <input type="text" name="kontak" value="{{ old('kontak', $vendor->kontak) }}" class="w-full border rounded-lg px-3 py-2">
            @error('kontak') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', $vendor->alamat) }}" class="w-full border rounded-lg px-3 py-2">
            @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Jumlah Produk</label>
            <input type="number" name="jumlah_product" value="{{ old('jumlah_product', $vendor->jumlah_product) }}" class="w-full border rounded-lg px-3 py-2">
            @error('jumlah_product') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border rounded-lg px-3 py-2">
                <option value="aktif" {{ old('status', $vendor->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status', $vendor->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                <option value="pending" {{ old('status', $vendor->status) == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.vendors.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</a>
            <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg">Update</button>
        </div>
    </form>
</div>
@endsection
