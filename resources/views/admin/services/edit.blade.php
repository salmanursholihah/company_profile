@extends('layouts.admin')

@section('content')
<h3>Edit Layanan</h3>

<form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" value="{{ $service->title }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" rows="4" class="form-control">{{ $service->description }}</textarea>
    </div>

    <div class="mb-3">
        <label>Gambar</label><br>
        <img src="{{ asset('storage/' . $service->image) }}" width="150">
        <input type="file" name="image" class="form-control mt-2">
    </div>
    <div class="mb-3">
        <label>Link</label>
        <input type="url" name="link" value="{{ $service->link }}" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection
