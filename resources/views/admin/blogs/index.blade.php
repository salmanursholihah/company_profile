@extends('layouts.admin')

@section('content')
<h2>Blog List</h2>

<a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Create Blog</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Published</th>
            <th width="150">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($blogs as $blog)
        <tr>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->category }}</td>
            <td>{{ $blog->author }}</td>
            <td>{{ $blog->published_at }}</td>
            <td>
                <a href="{{ route('admin.blogs.show', $blog->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Delete this blog?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

{{ $blogs->links() }}

@endsection
