@extends('layouts.admin')

@section('content')
<div class="container py-5">

    <h3>Edit Konten About</h3>

    <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Headline</label>
            <input type="text" name="headline" class="form-control" value="{{ $about->headline }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Sub Headline</label>
            <input type="text" name="sub_headline" class="form-control" value="{{ $about->sub_headline }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini</label><br>
            <img src="{{ asset($about->image) }}" width="200" class="rounded mb-2">
            <input type="file" name="image" class="form-control mt-2" accept="image/*">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="5" required>{{ $about->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">URL (opsional)</label>
            <input type="text" name="url" value="{{ $about->url }}" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
    </form>

</div>
@endsection
