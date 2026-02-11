@extends('layouts.admin')

@section('content')
    <h2>Edit Katalog</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.katalogs.update', $katalog) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $katalog->name) }}">
        </div>

        <div class="mb-3">
            <label>Company</label>
            <input type="text" name="company" class="form-control" value="{{ old('company', $katalog->company) }}">
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $katalog->kategori) }}">
        </div>

        <div class="mb-3">
            <label>Preview Deskripsi</label>
            <textarea name="preview_desc" class="form-control">{{ old('preview_desc', $katalog->preview_desc) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Deskripsi Lengkap</label>
            <textarea name="deskripsi" class="form-control" rows="5">{{ old('deskripsi', $katalog->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Spesifikasi</label>
            <textarea name="spesifikasi" class="form-control">{{ old('spesifikasi', $katalog->spesifikasi) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Image Lama</label><br>
            <img src="{{ asset('storage/' . $katalog->image) }}" width="120">
        </div>

        <div class="mb-3">
            <label>Upload Image Baru (Optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>

    </form>
@endsection
