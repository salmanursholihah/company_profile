@extends('layouts.admin')

@section('content')
<h2>Add Portfolio</h2>

<form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Category</label>
        <input type="text" name="category" class="form-control">
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" rows="5" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary">Save</button>
</form>
@endsection
