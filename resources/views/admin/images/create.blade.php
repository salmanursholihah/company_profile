@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Gambar</h1>

    <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Pilih Gambar</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Judul Gambar</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.images.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

