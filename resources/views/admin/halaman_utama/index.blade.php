@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between mb-3">
            <h3>halaman_utama Slider</h3>
            <a href="{{ route('admin.halaman_utama.create') }}" class="btn btn-primary">Tambah halaman_utama</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Headline</th>
                    <th>Sub Headline</th>
                    <th>URL</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($halaman_utamas as $halaman_utama)
                    <tr>
                        <td><img src="{{ asset($halaman_utama->image) }}" width="150"></td>
                        <td>{{ $halaman_utama->headline }}</td>
                        <td>{{ $halaman_utama->sub_headline }}</td>
                        <td>{{ $halaman_utama->url }}</td>
                        <td>
                            <a href="{{ route('admin.halaman_utama.edit', $halaman_utama->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.halaman_utama.destroy', $halaman_utama->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
