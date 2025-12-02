@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6">Tambah Produk Baru</h2>

    <form action="{{ route('admin.katalogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium mb-1">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full border rounded-lg px-3 py-2 @error('name') border-red-500 @enderror">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>


        <div>
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                class="w-full border rounded-lg px-3 py-2 @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
            @error('deskripsi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>



     <div>
            <label class="block font-medium mb-1">Company</label>
            <input type="text" name="company" value="{{ old('company') }}"
                class="w-full border rounded-lg px-3 py-2 @error('company') border-red-500 @enderror">
            @error('company') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block font-medium mb-1">Gambar</label>
            <input type="file" name="image" class="w-full border rounded-lg px-3 py-2">
        </div>

        <div class="flex gap-2 mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            <a href="{{ route('admin.katalogs.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection


