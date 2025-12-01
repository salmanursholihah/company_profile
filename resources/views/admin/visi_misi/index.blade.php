@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h3>Data Visi & Misi</h3>

    <a href="{{ route('admin.visi_misi.create') }}" class="btn btn-primary mb-3">Tambah</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Icon</th>
                <th>Text</th>
                <th>Type</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td><i class="{{ $item->icon }}"></i> {{ $item->icon }}</td>
                    <td>{{ $item->text }}</td>
                    <td>{{ ucfirst($item->type) }}</td>
                    <td>
                        <a href="{{ route('admin.visi_misi.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.visi_misi.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
