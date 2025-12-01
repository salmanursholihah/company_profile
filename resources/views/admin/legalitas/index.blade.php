@extends('layouts.admin')

@section('content')
    <h3>Data Legalitas</h3>

    <a href="{{ route('admin.legalitas.create') }}" class="btn btn-primary mb-3">Tambah Legalitas</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Urutan</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($legalitas as $item)
                <tr>
                    <td>{{ $item->urutan }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>
                        @if ($item->image)
                            <img src="{{ asset('uploads/legalitas/' . $item->image) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.legalitas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.legalitas.destroy', $item->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
