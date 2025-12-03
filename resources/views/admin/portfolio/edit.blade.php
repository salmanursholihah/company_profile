@extends('layouts.admin')

@section('content')
<h2>Edit Portfolio</h2>

<form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $portfolio->name }}">
    </div>

    <div class="mb-3">
        <label>Category</label>
        <input type="text" name="category" class="form-control" value="{{ $portfolio->category }}">
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" rows="5" class="form-control">{{ $portfolio->description }}</textarea>
    </div>

    <div class="mb-3">
        <label>Current Image</label><br>
        @if ($portfolio->image)
            <img src="{{ asset('storage/' . $portfolio->image) }}" width="100">
        @endif
    </div>

    <div class="mb-3">
        <label>New Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
