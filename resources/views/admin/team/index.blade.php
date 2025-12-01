@extends('layouts.admin')

@section('content')
<h3>Team List</h3>

<a href="{{ route('admin.team.create') }}" class="btn btn-primary mb-3">Tambah Team</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teams as $team)
        <tr>
            <td>
                @if($team->image)
                    <img src="{{ asset('storage/' . $team->image) }}" width="80">
                @endif
            </td>
            <td>{{ $team->name }}</td>
            <td>{{ $team->jabatan }}</td>
            <td>
                <a href="{{ route('admin.team.edit', $team->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.team.destroy', $team->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
