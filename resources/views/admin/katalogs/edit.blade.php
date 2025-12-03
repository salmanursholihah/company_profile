@extends('layouts.admin')

@section('content')

<h2>Edit Katalog</h2>

<form action="{{ route('admin.katalogs.update', $katalog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <label>Name</label>
    <input type="text" name="name" value="{{ $katalog->name }}" class="form-control">

    <label>Company</label>
    <input type="text" name="company" value="{{ $katalog->company }}" class="form-control">

    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="5">{{ $katalog->deskripsi }}</textarea>

    <label>Current Image</label><br>
    <img src="{{ asset('storage/' . $katalog->image) }}" width="120" class="mb-2">

    <label>New Image</label>
    <input type="file" name="image" class="form-control">

    <button class="btn btn-success mt-3">Update</button>
</form>

@endsection
