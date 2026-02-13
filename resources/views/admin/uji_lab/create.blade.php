@extends('layouts.admin')

@section('content')
<div class="container">

    <h3>Tambah Hasil Uji Lab</h3>

    <form action="{{ route('admin.hasil-uji-lab.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul"
                class="form-control" value="{{ old('judul') }}">
        </div>

        <div class="mb-3">
            <label>Poin 1</label>
            <textarea name="poin1"
                class="form-control">{{ old('poin1') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Poin 2</label>
            <textarea name="poin2"
                class="form-control">{{ old('poin2') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.hasil-uji-lab.index') }}"
            class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection
