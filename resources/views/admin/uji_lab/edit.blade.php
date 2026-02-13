@extends('layouts.admin')

@section('content')
<div class="container">

    <h3>Edit Hasil Uji Lab</h3>

    <form action="{{ route('admin.hasil-uji-lab.update',$data->id) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul"
                class="form-control"
                value="{{ old('judul',$data->judul) }}">
        </div>

        <div class="mb-3">
            <label>Poin 1</label>
            <textarea name="poin1"
                class="form-control">{{ old('poin1',$data->poin1) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Poin 2</label>
            <textarea name="poin2"
                class="form-control">{{ old('poin2',$data->poin2) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label><br>

            @if($data->gambar)
                <img src="{{ asset($data->gambar) }}" width="150" class="mb-2">
            @endif

            <input type="file" name="gambar" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.hasil-uji-lab.index') }}"
            class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection
