@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h3>Edit Halaman Utama</h3>

    <form action="{{ route('admin.halaman_utama.update', $halaman_utama->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Headline</label>
            <input type="text" name="headline" class="form-control" value="{{ $halaman_utama->headline }}">
        </div>

        <div class="mb-3">
            <label>Sub Headline</label>
            <input type="text" name="sub_headline" class="form-control" value="{{ $halaman_utama->sub_headline }}">
        </div>

        <div class="mb-3">
            <label>URL</label>
            <input type="text" name="url" class="form-control" value="{{ $halaman_utama->url }}">
        </div>

        <div class="mb-3">
            <label>Gambar Saat Ini</label><br>
            <img src="{{ asset($halaman_utama->image) }}" width="200">
        </div>

        <div class="mb-3">
            <label>Ganti Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary" type="submit">Update</button>
    </form>
</div>
@endsection
