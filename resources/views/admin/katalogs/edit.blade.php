@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6">Edit Produk</h2>

    <form action="{{ route('admin.katalogs.update', $katalog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $katalog->name) }}" 
                class="w-full border rounded-lg px-3 py-2 @error('name') border-red-500 @enderror">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="w-full border rounded-lg px-3 py-2">{{ old('deskripsi', $katalog->deskripsi) }}</textarea>
        </div>
        <div>
            <label class="block font-medium mb-1">company</label>
            <textarea name="company" rows="4" class="w-full border rounded-lg px-3 py-2">{{ old('company', $katalog->company) }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-1">Gambar</label>
            <input type="file" name="image" class="w-full border rounded-lg px-3 py-2">
            @if($katalog->image)
                <img src="{{ asset('storage/'.$katalog->image) }}" class="w-32 h-32 mt-2 object-cover rounded-lg">
            @endif
        </div>

        <div class="flex gap-2 mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
            <a href="{{ route('admin.katalogs.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection
