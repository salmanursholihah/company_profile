@extends('layouts.admin')

@section('content')

<h2>Tambah Katalog</h2>

<form action="{{ route('admin.katalogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Name</label>
    <input type="text" name="name" class="form-control">

    <label>Company</label>
    <input type="text" name="company" class="form-control">

    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="5"></textarea>

    <label>Image</label>
    <input type="file" name="image" class="form-control">

    <button class="btn btn-primary mt-3">Simpan</button>
</form>

@endsection
