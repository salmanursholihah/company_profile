@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Blog Baru</h1>

    <!-- Notifikasi error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada beberapa masalah dengan input kamu.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                   class="form-control" placeholder="Masukkan judul blog" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" 
                   class="form-control" placeholder="contoh-judul-blog" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}" 
                   class="form-control" placeholder="Masukkan kategori" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" name="author" id="author" value="{{ old('author') }}" 
                   class="form-control" placeholder="Nama penulis" required>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Tanggal Publish</label>
            <input type="date" name="published_at" id="published_at" value="{{ old('published_at') }}" 
                   class="form-control">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea name="content" id="content" rows="6" 
                      class="form-control" placeholder="Tulis isi blog..." required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar (opsional)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
