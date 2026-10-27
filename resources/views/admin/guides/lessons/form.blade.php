@extends('layouts.admin')
@section('title', $lesson->exists ? 'Edit Materi' : 'Tambah Materi')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif

@php $type = old('type', $lesson->type); @endphp

<form method="POST" enctype="multipart/form-data"
      action="{{ $lesson->exists ? route('admin.guides.lessons.update', [$guide, $lesson]) : route('admin.guides.lessons.store', $guide) }}">
    @csrf
    @if ($lesson->exists) @method('PUT') @endif

    <p class="text-muted">Panduan: <b>{{ $guide->title }}</b></p>

    <div class="mb-3">
        <label class="form-label">Judul materi</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $lesson->title) }}" required>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Tipe</label>
            <select name="type" id="lessonType" class="form-control">
                <option value="video" @selected($type === 'video')>Video (link YouTube)</option>
                <option value="file" @selected($type === 'file')>File (PDF/Word/modul)</option>
                <option value="article" @selected($type === 'article')>Artikel</option>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Durasi (menit, opsional)</label>
            <input type="number" name="duration_minutes" min="0" class="form-control" value="{{ old('duration_minutes', $lesson->duration_minutes) }}">
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Urutan</label>
            <input type="number" name="sort_order" min="0" class="form-control" value="{{ old('sort_order', $lesson->sort_order ?? 0) }}">
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi singkat</label>
        <textarea name="description" rows="2" maxlength="1000" class="form-control">{{ old('description', $lesson->description) }}</textarea>
    </div>

    <div class="mb-3 lesson-field" data-type="video">
        <label class="form-label">Link YouTube</label>
        <input type="url" name="video_url" class="form-control" placeholder="https://www.youtube.com/watch?v=..." value="{{ old('video_url', $lesson->video_url) }}">
        <small class="text-muted">Video "tidak publik" tetap bisa dibuka siapa pun yang memegang link; API hanya mengirim link ke yang berhak.</small>
    </div>
    <div class="mb-3 lesson-field" data-type="file">
        <label class="form-label">File (pdf, doc, docx, ppt, pptx, xls, xlsx, zip — maks 20 MB)</label>
        @if ($lesson->file_name)<div class="mb-1">Saat ini: <b>{{ $lesson->file_name }}</b> (kosongkan bila tidak diganti)</div>@endif
        <input type="file" name="file" class="form-control">
    </div>
    <div class="mb-3 lesson-field" data-type="article">
        <label class="form-label">Isi artikel (HTML)</label>
        <textarea name="content" rows="12" class="form-control">{{ old('content', $lesson->content) }}</textarea>
    </div>

    <div class="form-check mb-2">
        <input type="checkbox" class="form-check-input" id="free" name="is_free" value="1" @checked(old('is_free', $lesson->is_free))>
        <label class="form-check-label" for="free">Gratis (bisa dibuka tanpa langganan)</label>
    </div>
    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="pub" name="is_published" value="1" @checked(old('is_published', $lesson->is_published))>
        <label class="form-check-label" for="pub">Terbitkan</label>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.guides.lessons.index', $guide) }}" class="btn btn-secondary">Batal</a>
</form>

<script>
    (function () {
        var sel = document.getElementById('lessonType');
        function sync() {
            document.querySelectorAll('.lesson-field').forEach(function (el) {
                el.style.display = el.dataset.type === sel.value ? '' : 'none';
            });
        }
        sel.addEventListener('change', sync);
        sync();
    })();
</script>
@endsection
