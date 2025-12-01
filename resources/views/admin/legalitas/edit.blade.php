@extends('layouts.admin')

@section('content')
    <h3>Edit Legalitas</h3>

    <form action="{{ route('admin.legalitas.update', $legalitas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ $legalitas->judul }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ $legalitas->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Urutan</label>
            <input type="number" name="urutan" value="{{ $legalitas->urutan }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gambar Saat Ini</label><br>
            @if ($legalitas->image)
                <img src="{{ asset('uploads/legalitas/' . $legalitas->image) }}" width="120">
            @endif
        </div>

        <div class="mb-3">
            <label>Upload Gambar Baru</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>

    </form>
@endsection
