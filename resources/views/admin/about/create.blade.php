@extends('layouts.admin')

@section('content')
<div class="container py-5">

    <h3>Tambah Konten About</h3>

    <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf

        <div class="mb-3">
            <label class="form-label">Headline</label>
            <input type="text" name="headline" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Sub Headline</label>
            <input type="text" name="sub_headline" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">URL (opsional)</label>
            <input type="text" name="url" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>

</div>
@endsection
