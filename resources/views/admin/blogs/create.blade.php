@extends('layouts.admin')

@section('content')
<h2>Create Blog</h2>

<form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="mb-3">
        <label>Category</label>
        <input type="text" name="category" class="form-control">
    </div>

    <div class="mb-3">
        <label>Author</label>
        <input type="text" name="author" class="form-control">
    </div>

    <div class="mb-3">
        <label>Published At</label>
        <input type="date" name="published_at" class="form-control">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control" rows="8"></textarea>
    </div>

    <button class="btn btn-primary">Save</button>
</form>
@endsection
