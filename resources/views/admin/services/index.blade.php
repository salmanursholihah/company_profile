@extends('layouts.admin')

@section('content')
<a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3">Tambah Layanan</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Link</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($services as $service)
        <tr>
            <td>
                <img src="{{ asset('storage/' . $service->image) }}" width="100">
            </td>
            <td>{{ $service->title }}</td>
            <td>{{ Str::limit($service->description, 80) }}</td>
            <td>
                @if ($service->link)
                    <a href="{{ $service->link }}" target="_blank">{{ $service->link }}</a>
                @else
                    N/A
                @endif
            </td>
            <td>
                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                      style="display:inline-block">

                    @csrf
                    @method('DELETE')

                    <button onclick="return confirm('Hapus layanan ini?')"
                        class="btn btn-danger btn-sm">
                        Hapus
                    </button>

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
