@extends('layouts.admin')

@section('content')
<h3>Tambah Layanan</h3>

<form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
    </div>

    <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>

@endsection
