@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="fw-bold mb-4">Manajemen Blog</h1>

    <!-- Filter & Search -->
    <form method="GET" action="{{ route('admin.blogs.index') }}" class="d-flex gap-2 mb-4">
        <input type="text" name="search" class="form-control" placeholder="Cari judul..." value="{{ request('search') }}">
        
        <select name="status" class="form-select">
            <option value="">Status</option>
            <option value="published" {{ request('status')=='published'?'selected':'' }}>Published</option>
            <option value="draft" {{ request('status')=='draft'?'selected':'' }}>Draft</option>
        </select>

        <select name="sort" class="form-select">
            <option value="">Urutkan</option>
            <option value="latest" {{ request('sort')=='latest'?'selected':'' }}>Terbaru</option>
            <option value="oldest" {{ request('sort')=='oldest'?'selected':'' }}>Terlama</option>
        </select>

        <button type="submit" class="btn btn-dark">Terapkan</button>
    </form>
        <a href="{{ route('admin.blogs.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Tambah blog</a>
<br><br>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Author</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->author }}</td>
                        <td>{{ $blog->category }}</td>
                        <td>
                            @if($blog->status === 'published')
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>{{ $blog->views ?? 0 }}</td>
                        <td>{{ optional($blog->published_at)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus blog ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada blog</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3 d-flex justify-content-between align-items-center">
        <div>
            Menampilkan {{ $blogs->firstItem() }} - {{ $blogs->lastItem() }} dari {{ $blogs->total() }}
        </div>
        <div>
            {{ $blogs->links() }}
        </div>
    </div>
</div>
@endsection
