@extends('layouts.admin')

@section('content')

<h2>Katalog List</h2>

<a href="{{ route('admin.katalogs.create') }}" class="btn btn-primary mb-3">Tambah Katalog</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Company</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($katalogs as $item)
        <tr>
            <td><img src="{{ asset('storage/' . $item->image) }}" width="80"></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->company }}</td>
            <td>
                <a href="{{ route('admin.katalogs.edit', $item->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('admin.katalogs.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Hapus data?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
