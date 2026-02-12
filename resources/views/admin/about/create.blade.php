@extends('layouts.admin')

@section('content')
    <div class="container py-4">

        <h3 class="mb-4">Manage Company Profile Content</h3>

        <div class="row">

            {{-- ================= ABOUT ================= --}}
            <div class="col-lg-12 mb-4">
                <div class="card shadow-sm border-0">

                    <div class="card-header bg-primary text-white">
                        <b>About Perusahaan</b>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Headline</label>
                                    <input type="text" name="headline" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Sub Headline</label>
                                    <input type="text" name="sub_headline" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Gambar</label>
                                    <input type="file" name="image" class="form-control" accept="image/*" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">URL (Opsional)</label>
                                    <input type="text" name="url" class="form-control">
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="description" class="form-control" rows="5" required></textarea>
                                </div>

                            </div>

                            <button class="btn btn-primary">
                                Simpan About
                            </button>

                        </form>

                    </div>
                </div>
            </div>


            {{-- ================= LEGALITAS ================= --}}
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0">

                    <div class="card-header bg-success text-white">
                        <b>Legalitas Perusahaan</b>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.legalitas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Urutan</label>
                                <input type="number" name="urutan" class="form-control" value="0">
                            </div>

                            <div class="mb-3">
                                <label>Upload Gambar</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <button class="btn btn-success">
                                Simpan Legalitas
                            </button>

                        </form>

                    </div>
                </div>
            </div>


            {{-- ================= VISI MISI ================= --}}
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0">

                    <div class="card-header bg-info text-white">
                        <b>Visi & Misi</b>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.visi_misi.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Icon (Class)</label>
                                <input type="text" name="icon" class="form-control"
                                    placeholder="Contoh: ri-check-line">
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

                            <button class="btn btn-info text-white">
                                Simpan Visi / Misi
                            </button>

                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
