@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <h3>Edit Visi / Misi</h3>

        <form action="{{ route('admin.visi_misi.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Icon</label>
                <input type="text" name="icon" class="form-control" value="{{ $item->icon }}">
            </div>

            <div class="mb-3">
                <label>Teks</label>
                <textarea name="text" class="form-control" required>{{ $item->text }}</textarea>
            </div>

            <div class="mb-3">
                <label>Tipe</label>
                <select name="type" class="form-control">
                    <option value="visi" {{ $item->type == 'visi' ? 'selected' : '' }}>Visi</option>
                    <option value="misi" {{ $item->type == 'misi' ? 'selected' : '' }}>Misi</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
