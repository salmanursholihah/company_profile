@extends('layouts.admin')
@section('title', 'Kategori Panduan')

@section('content')
<a href="{{ route('admin.guide-categories.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
<a href="{{ route('admin.guides.index') }}" class="btn btn-secondary mb-3">Kembali ke Panduan</a>

<table class="table table-bordered">
    <thead><tr><th>Urutan</th><th>Nama</th><th>Slug</th><th>Panduan</th><th>Status</th><th>Aksi</th></tr></thead>
    <tbody>
        @forelse ($categories as $c)
        <tr>
            <td>{{ $c->sort_order }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->slug }}</td>
            <td>{{ $c->guides_count }}</td>
            <td>{{ $c->is_active ? 'Aktif' : 'Nonaktif' }}</td>
            <td>
                <a href="{{ route('admin.guide-categories.edit', $c) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.guide-categories.destroy', $c) }}" method="POST" style="display:inline-block">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Hapus kategori ini?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center text-muted">Belum ada kategori.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
