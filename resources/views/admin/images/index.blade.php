@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Manajemen Gambar</h1>

        <a href="{{ route('admin.images.create') }}" class="btn btn-primary mb-3">+ Tambah Gambar</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Preview</th>
                    <th>Nama File</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($images as $img)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td>
                            <img src="{{ asset('storage/' . $img->filename) }}">
 --}}

                        <td>
                            {{-- INI YANG BENAR → PAKAI image_path --}}
                            <img src="{{ Storage::url($img->image_path) }}" width="120">
                        </td>
                        <td>{{ $img->title }}</td>

                        <td>
                            <a href="{{ route('admin.images.edit', $img->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.images.destroy', $img->id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Yakin hapus gambar ini?')" class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada gambar</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
@endsection
