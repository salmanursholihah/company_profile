@extends('layouts.admin')
@section('title', 'Panduan')

@section('content')
<a href="{{ route('admin.guides.create') }}" class="btn btn-primary mb-3">Tambah Panduan</a>
<a href="{{ route('admin.guide-categories.index') }}" class="btn btn-outline-secondary mb-3">Kategori</a>

<table class="table table-bordered">
    <thead>
        <tr><th>Cover</th><th>Judul</th><th>Kategori</th><th>Level</th><th>Materi</th><th>Status</th><th>Aksi</th></tr>
    </thead>
    <tbody>
        @forelse ($guides as $g)
        <tr>
            <td>@if ($g->cover_url)<img src="{{ $g->cover_url }}" alt="" style="width:80px;height:44px;object-fit:cover;border-radius:6px">@endif</td>
            <td>{{ $g->title }}</td>
            <td>{{ $g->category->name ?? '-' }}</td>
            <td>{{ ucfirst($g->level) }}</td>
            <td>{{ $g->lessons_count }} ({{ $g->free_lessons_count }} gratis)</td>
            <td>{{ $g->is_published ? 'Terbit' : 'Draft' }}</td>
            <td>
                <a href="{{ route('admin.guides.lessons.index', $g) }}" class="btn btn-info btn-sm">Materi</a>
                <a href="{{ route('admin.guides.edit', $g) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.guides.destroy', $g) }}" method="POST" style="display:inline-block">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus panduan beserta semua materinya?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center text-muted">Belum ada panduan.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
