@extends('layouts.admin')
@section('title', $category->exists ? 'Edit Kategori' : 'Tambah Kategori')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif

<form method="POST" action="{{ $category->exists ? route('admin.guide-categories.update', $category) : route('admin.guide-categories.store') }}">
    @csrf
    @if ($category->exists) @method('PUT') @endif

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Urutan</label>
        <input type="number" name="sort_order" min="0" class="form-control" value="{{ old('sort_order', $category->sort_order ?? 0) }}">
    </div>
    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="act" name="is_active" value="1" @checked(old('is_active', $category->is_active))>
        <label class="form-check-label" for="act">Aktif</label>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.guide-categories.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
