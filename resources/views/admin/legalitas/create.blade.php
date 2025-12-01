@extends('layouts.admin')

@section('content')
<h3>Tambah Legalitas</h3>

<form action="{{ route('admin.legalitas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4"></textarea>
    </div>

    <div class="mb-3">
        <label>Urutan</label>
        <input type="number" name="urutan" class="form-control" value="0">
    </div>

    <div class="mb-3">
        <label>Upload Gambar</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
