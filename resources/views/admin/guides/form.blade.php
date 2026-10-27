@extends('layouts.admin')
@section('title', $guide->exists ? 'Edit Panduan' : 'Tambah Panduan')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif

<form method="POST" enctype="multipart/form-data"
      action="{{ $guide->exists ? route('admin.guides.update', $guide) : route('admin.guides.store') }}">
    @csrf
    @if ($guide->exists) @method('PUT') @endif

    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $guide->title) }}" required>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-control">
                <option value="">— Tanpa kategori —</option>
                @foreach ($categories as $c)
                    <option value="{{ $c->id }}" @selected(old('category_id', $guide->category_id) == $c->id)>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">Level</label>
            <select name="level" class="form-control">
                @foreach (['pemula', 'menengah', 'lanjut'] as $lv)
                    <option value="{{ $lv }}" @selected(old('level', $guide->level) === $lv)>{{ ucfirst($lv) }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label class="form-label">Urutan</label>
            <input type="number" name="sort_order" min="0" class="form-control" value="{{ old('sort_order', $guide->sort_order ?? 0) }}">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Ringkasan (tampil di kartu)</label>
        <textarea name="summary" rows="2" maxlength="500" class="form-control">{{ old('summary', $guide->summary) }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi lengkap</label>
        <textarea name="description" rows="5" class="form-control">{{ old('description', $guide->description) }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Cover (opsional)</label>
        <div class="mb-2" id="cover-preview-wrap" @if (! $guide->cover_url) style="display:none" @endif>
            <img id="cover-preview" src="{{ $guide->cover_url }}" alt="Cover" style="max-width:260px;max-height:160px;border-radius:10px;object-fit:cover">
        </div>
        <input type="file" name="cover" id="cover-input" accept="image/jpeg,image/png,image/webp" class="form-control">
        <small class="text-muted">JPG, PNG, atau WEBP. Maksimal 2 MB. Disarankan rasio 16:8 (mis. 1280×640).</small>
        @if ($guide->cover_path)
            <div class="form-check mt-2">
                <input type="checkbox" class="form-check-input" id="remove_cover" name="remove_cover" value="1">
                <label class="form-check-label" for="remove_cover">Hapus cover saat ini</label>
            </div>
        @endif
    </div>
    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="pub" name="is_published" value="1" @checked(old('is_published', $guide->is_published))>
        <label class="form-check-label" for="pub">Terbitkan</label>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.guides.index') }}" class="btn btn-secondary">Batal</a>
</form>

<script>
(function () {
    var input = document.getElementById('cover-input');
    if (!input) return;
    input.addEventListener('change', function () {
        var f = input.files && input.files[0];
        if (!f) return;
        if (f.size > 2 * 1024 * 1024) {
            alert('Ukuran cover ' + (f.size / 1048576).toFixed(1) + ' MB melebihi batas 2 MB. Pilih gambar yang lebih kecil.');
            input.value = '';
            return;
        }
        document.getElementById('cover-preview').src = URL.createObjectURL(f);
        document.getElementById('cover-preview-wrap').style.display = '';
    });
})();
</script>
@endsection
