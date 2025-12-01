@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h3>Tambah Halaman Utama</h3>

    <form action="{{ route('admin.halaman_utama.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Headline</label>
            <input type="text" name="headline" class="form-control" value="{{ old('headline') }}">
        </div>

        <div class="mb-3">
            <label>Sub Headline</label>
            <input type="text" name="sub_headline" class="form-control" value="{{ old('sub_headline') }}">
        </div>

        <div class="mb-3">
            <label>URL</label>
            <input type="text" name="url" class="form-control" value="{{ old('url') }}">
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
</div>
@endsection
