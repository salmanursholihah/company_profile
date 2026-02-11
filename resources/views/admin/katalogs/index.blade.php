@extends('layouts.admin')

@section('content')
    <h2>Data Katalog</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.katalogs.create') }}" class="btn btn-primary mb-3">
        Tambah Katalog
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nama</th>
                <th>Company</th>
                <th>Kategori</th>
                <th>Preview</th>
                <th>Kode Produk</th>
                <th>Brand</th>
                <th>Model Produk</th>
                <th>Seri Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($katalogs as $item)
                <tr>

                    <td>
                        <img src="{{ asset('storage/' . $item->image) }}" width="80">
                    </td>

                    <td>{{ $item->name }}</td>
                    <td>{{ $item->company }}</td>
                    <td>{{ $item->kategori }}</td>

                    <td>
                        {{ Str::limit($item->preview_desc, 50) }}
                    </td>
                    <td>{{ $item->kode_produk }}</td>
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->model_produk }}</td>
                    <td>{{ $item->seri_produk }}</td>

                    <td>

                        <a href="{{ route('admin.katalogs.show', $item) }}" class="btn btn-info btn-sm">Detail</a>

                        <a href="{{ route('admin.katalogs.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.katalogs.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Belum ada data
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>
@endsection
