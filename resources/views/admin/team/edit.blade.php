@extends('layouts.admin')

@section('content')
<h3>Edit Team</h3>

<form action="{{ route('admin.team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" value="{{ $team->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" value="{{ $team->jabatan }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Image</label><br>
        @if($team->image)
            <img src="{{ asset('storage/' . $team->image) }}" width="120" class="mb-2">
        @endif
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-success">Update</button>
</form>
@endsection
