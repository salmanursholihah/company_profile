@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <h3>Tambah Visi / Misi</h3>

        <form action="{{ route('admin.visi_misi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Icon (class)</label>
                <input type="text" name="icon" class="form-control" placeholder="contoh: ri-check-line">
            </div>

            <div class="mb-3">
                <label>Teks</label>
                <textarea name="text" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label>Tipe</label>
                <select name="type" class="form-control">
                    <option value="visi">Visi</option>
                    <option value="misi">Misi</option>
                </select>
            </div>

            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
