@extends('layouts.admin')

@section('content')
<h2>Edit Blog</h2>

<form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
    </div>

    <div class="mb-3">
        <label>Category</label>
        <input type="text" name="category" class="form-control" value="{{ $blog->category }}">
    </div>

    <div class="mb-3">
        <label>Author</label>
        <input type="text" name="author" class="form-control" value="{{ $blog->author }}">
    </div>

    <div class="mb-3">
        <label>Published At</label>
        <input type="date" name="published_at" class="form-control" value="{{ $blog->published_at }}">
    </div>

    <div class="mb-3">
        <label>Current Image</label><br>
        @if ($blog->image)
        <img src="{{ asset('storage/' . $blog->image) }}" width="120">
        @endif
    </div>

    <div class="mb-3">
        <label>New Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control" rows="8">{{ $blog->content }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
