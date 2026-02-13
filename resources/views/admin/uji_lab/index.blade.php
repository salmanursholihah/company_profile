@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h3>Data Hasil Uji Lab</h3>
        <a href="{{ route('admin.hasil-uji-lab.create') }}" class="btn btn-primary">
            + Tambah Data
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>
                <td>
                    @if($item->gambar)
                        <img src="{{ asset($item->gambar) }}" width="120">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.hasil-uji-lab.edit',$item->id) }}"
                        class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.hasil-uji-lab.destroy',$item->id) }}"
                        method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus data?')"
                            class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
