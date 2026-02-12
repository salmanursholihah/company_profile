{{-- @extends('layouts.admin')

@section('content')

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Manage About</h3>

            @if ($about)
                <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-warning">
                    Edit Konten
                </a>
            @else
                <a href="{{ route('admin.about.create') }}" class="btn btn-primary">
                    Tambah Konten
                </a>
            @endif
        </div>

        @if ($about)
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset($about->image) }}" class="img-fluid rounded border" alt="about image">
                </div>

                <div class="col-md-7">
                    <h2>{{ $about->headline }}</h2>
                    <h5 class="text-muted">{{ $about->sub_headline }}</h5>

                    <p class="mt-3">
                        {!! nl2br(e($about->description)) !!}
                    </p>

                    @if ($about->url)
                        <a href="{{ $about->url }}" target="_blank" class="btn btn-info mt-3">
                            Lihat Link
                        </a>
                    @endif
                </div>
            </div>
        @else
            <div class="alert alert-info">
                Data About belum diisi. Silakan tambahkan.
            </div>
        @endif

    </div>

@endsection --}}


@extends('layouts.admin')

@section('content')
    <div class="container py-4">

        <h2 class="mb-4">Management Company Content</h2>

        {{-- ================= ABOUT ================= --}}
        <div class="card shadow-sm mb-5">
            <div class="card-header bg-primary text-white">
                <b>Tambah About</b>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.about.storeAbout') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Headline</label>
                            <input type="text" name="headline" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Sub Headline</label>
                            <input type="text" name="sub_headline" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Gambar</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>URL</label>
                            <input type="text" name="url" class="form-control">
                        </div>

                    </div>

                    <button class="btn btn-primary">Simpan About</button>
                </form>
            </div>
        </div>


        {{-- TABLE ABOUT --}}
        <div class="card shadow-sm mb-5">
            <div class="card-header bg-dark text-white">
                <b>List About</b>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Headline</th>
                            <th>Sub Headline</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>URL</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($abouts as $item)
                            <tr>
                                <td>{{ $item->headline }}</td>
                                <td>{{ $item->sub_headline }}</td>
                                <td>{{ Str::limit(strip_tags($item->description), 120) }}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset($item->image) }}" width="80">
                                    @endif
                                </td>
                                <td>{{ $item->url }}</td>
                                <td>
                                    <a href="{{ route('admin.about.editAbout', $item->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data About</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>


        {{-- ================= LEGALITAS ================= --}}
        <div class="card shadow-sm mb-5">
            <div class="card-header bg-success text-white">
                <b>Tambah Legalitas</b>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.about.storeLegalitas') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Urutan</label>
                            <input type="number" name="urutan" class="form-control" value="0">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Gambar</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" required></textarea>
                        </div>

                    </div>

                    <button class="btn btn-success">Simpan Legalitas</button>
                </form>
            </div>
        </div>


        {{-- TABLE LEGALITAS --}}
        <div class="card shadow-sm mb-5">
            <div class="card-header bg-dark text-white">
                <b>List Legalitas</b>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Urutan</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($legalitas as $item)
                            <tr>
                                <td>{{ $item->urutan }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ Str::limit(strip_tags($item->deskripsi), 120) }}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset('uploads/legalitas/' . $item->image) }}" width="80">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.about.editLegalitas', $item->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data Legalitas</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>


        {{-- ================= VISI MISI ================= --}}
        <div class="card shadow-sm mb-5">
            <div class="card-header bg-info text-white">
                <b>Tambah Visi Misi</b>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.about.storeVisiMisi') }}" method="POST">
                    @csrf

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label>Tipe</label>
                            <select name="type" class="form-control">
                                <option value="visi">Visi</option>
                                <option value="misi">Misi</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Icon</label>
                            <input type="text" name="icon" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Text</label>
                            <textarea name="text" class="form-control" required></textarea>
                        </div>

                    </div>

                    <button class="btn btn-info">Simpan Visi Misi</button>
                </form>
            </div>
        </div>


        {{-- TABLE VISI MISI --}}
        <div class="card shadow-sm mb-5">
            <div class="card-header bg-dark text-white">
                <b>List Visi Misi</b>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Icon</th>
                            <th>Text</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($visiMisi as $item)
                            <tr>
                                <td>{{ ucfirst($item->type) }}</td>
                                <td>{{ $item->icon }}</td>
                                <td>{{ $item->text }}</td>
                                <td>
                                    <a href="{{ route('admin.about.editVisiMisi', $item->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data Visi Misi</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

    </div>
@endsection
