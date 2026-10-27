@extends('layouts.admin')
@section('title', $plan->exists ? 'Edit Paket' : 'Tambah Paket')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif

<form method="POST" action="{{ $plan->exists ? route('admin.subscription-plans.update', $plan) : route('admin.subscription-plans.store') }}">
    @csrf
    @if ($plan->exists) @method('PUT') @endif

    <div class="mb-3">
        <label class="form-label">Nama paket</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $plan->name) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" rows="2" class="form-control">{{ old('description', $plan->description) }}</textarea>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Durasi (hari)</label>
            <input type="number" name="duration_days" min="1" class="form-control" value="{{ old('duration_days', $plan->duration_days) }}" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Harga (Rp)</label>
            <input type="number" name="price" min="1000" step="1" class="form-control" value="{{ old('price', $plan->price ? (int) $plan->price : '') }}" required>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Urutan</label>
            <input type="number" name="sort_order" min="0" class="form-control" value="{{ old('sort_order', $plan->sort_order ?? 0) }}">
        </div>
    </div>
    <div class="form-check mb-2">
        <input type="checkbox" class="form-check-input" id="pop" name="is_popular" value="1" @checked(old('is_popular', $plan->is_popular))>
        <label class="form-check-label" for="pop">Tandai "Populer"</label>
    </div>
    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="act" name="is_active" value="1" @checked(old('is_active', $plan->is_active))>
        <label class="form-check-label" for="act">Aktif (tampil di aplikasi)</label>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.subscription-plans.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
