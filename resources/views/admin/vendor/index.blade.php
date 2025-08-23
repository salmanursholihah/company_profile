
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<body class="bg-light">

  <div class="container py-5">
    <h2 class="mb-4">Data Vendor</h2>

    <!-- Table Vendor -->
    <div class="card shadow-sm">
      <div class="card-body">
        <table class="table table-striped table-hover align-middle">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Nama Vendor</th>
              <th>Email</th>
              <th>Kontak</th>
              <th>Alamat</th>
              <th>Produk</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>
                <div class="d-flex align-items-center">
                  <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="vendor">
                  <span>PT Sumber Makmur</span>
                </div>
              </td>
              <td>vendor@sumber.com</td>
              <td>0812-3456-7890</td>
              <td>Jakarta, Indonesia</td>
              <td>120</td>
              <td><span class="badge bg-success">Aktif</span></td>
              <td>
                <button class="btn btn-sm btn-primary">Detail</button>
                <button class="btn btn-sm btn-warning">Edit</button>
                <button class="btn btn-sm btn-danger">Hapus</button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>
                <div class="d-flex align-items-center">
                  <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="vendor">
                  <span>CV Digital Abadi</span>
                </div>
              </td>
              <td>contact@digitalabadi.com</td>
              <td>0821-9876-5432</td>
              <td>Bandung, Indonesia</td>
              <td>45</td>
              <td><span class="badge bg-danger">Nonaktif</span></td>
              <td>
                <button class="btn btn-sm btn-primary">Detail</button>
                <button class="btn btn-sm btn-warning">Edit</button>
                <button class="btn btn-sm btn-danger">Hapus</button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>
                <div class="d-flex align-items-center">
                  <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="vendor">
                  <span>Toko Maju Jaya</span>
                </div>
              </td>
              <td>majujaya@tokoonline.com</td>
              <td>0878-2222-3333</td>
              <td>Surabaya, Indonesia</td>
              <td>200</td>
              <td><span class="badge bg-warning text-dark">Pending</span></td>
              <td>
                <button class="btn btn-sm btn-primary">Detail</button>
                <button class="btn btn-sm btn-warning">Edit</button>
                <button class="btn btn-sm btn-danger">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection