@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Gambar</h1>

    <img src="{{ asset('storage/images/' . $image->filename) }}" width="200" class="mb-3">

    <form action="{{ route('admin.images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Ganti Gambar (Opsional)</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.images.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
