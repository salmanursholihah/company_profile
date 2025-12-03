@extends('layouts.admin')

@section('content')
<h2>Portfolio List</h2>

<a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary mb-3">Add Portfolio</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Image</th>
            <th width="180">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($portfolios as $portfolio)
        <tr>
            <td>{{ $portfolio->name }}</td>
            <td>{{ $portfolio->category }}</td>
            <td>
                @if ($portfolio->image)
                <img src="{{ asset('storage/' . $portfolio->image) }}" width="80">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.portfolio.show', $portfolio->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}"
                      method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Delete this item?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

{{ $portfolios->links() }}

@endsection
