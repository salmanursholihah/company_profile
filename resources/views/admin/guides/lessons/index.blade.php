@extends('layouts.admin')
@section('title', 'Materi: ' . $guide->title)

@section('content')
<a href="{{ route('admin.guides.lessons.create', $guide) }}" class="btn btn-primary mb-3">Tambah Materi</a>
<a href="{{ route('admin.guides.index') }}" class="btn btn-secondary mb-3">Kembali</a>

<table class="table table-bordered">
    <thead><tr><th>#</th><th>Judul</th><th>Tipe</th><th>Akses</th><th>Durasi</th><th>Status</th><th>Aksi</th></tr></thead>
    <tbody>
        @forelse ($lessons as $l)
        <tr>
            <td>{{ $l->sort_order }}</td>
            <td>{{ $l->title }}</td>
            <td>{{ ['video' => 'Video', 'file' => 'File', 'article' => 'Artikel'][$l->type] }}</td>
            <td>{!! $l->is_free ? '<span class="badge bg-success">Gratis</span>' : '<span class="badge bg-warning text-dark">Premium</span>' !!}</td>
            <td>{{ $l->duration_minutes ? $l->duration_minutes . ' mnt' : '-' }}</td>
            <td>{{ $l->is_published ? 'Terbit' : 'Draft' }}</td>
            <td>
                <a href="{{ route('admin.guides.lessons.edit', [$guide, $l]) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.guides.lessons.destroy', [$guide, $l]) }}" method="POST" style="display:inline-block">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus materi ini?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center text-muted">Belum ada materi.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
