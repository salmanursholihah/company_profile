@extends('layouts.admin')

@section('content')
    <h2>Tambah Katalog</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.katalogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>Company</label>
            <input type="text" name="company" class="form-control" value="{{ old('company') }}">
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ old('kategori') }}">
        </div>

        <div class="mb-3">
            <label>Preview Deskripsi</label>
            <textarea name="preview_desc" class="form-control">{{ old('preview_desc') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Deskripsi Lengkap</label>
            <textarea name="deskripsi" class="form-control" rows="5">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Spesifikasi</label>
            <textarea name="spesifikasi" class="form-control">{{ old('spesifikasi') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Kode Produk</label>
            <input type="text" name="kode_produk" class="form-control" value="{{ old('kode_produk') }}">
        </div>

        <div class="mb-3">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ old('brand') }}">
        </div>

        <div class="mb-3">
            <label>Model Produk</label>
            <input type="text" name="model_produk" class="form-control" value="{{ old('model_produk') }}">
        </div>

        <div class="mb-3">
            <label>Seri Produk</label>
            <input type="text" name="seri_produk" class="form-control" value="{{ old('seri_produk') }}">
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>

    </form>
@endsection
