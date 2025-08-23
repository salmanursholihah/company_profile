@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
  <!-- Container -->
  <div class="max-w-7xl mx-auto px-4 py-8 space-y-6">

    <!-- Filter/Search -->
    <div class="bg-white p-4 rounded-xl shadow flex flex-col md:flex-row md:items-center md:justify-between gap-3">
      <div class="flex gap-2">
        <input type="text" placeholder="Cari produk..." class="border rounded-lg px-3 py-2 w-64">
        <select class="border rounded-lg px-3 py-2">
          <option>Kategori</option>
          <option>Elektronik</option>
          <option>Pakaian</option>
          <option>Alat Rumah</option>
        </select>
      </div>
      <button class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">Terapkan</button>
    </div>

    <!-- Tabel Produk -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">
      <table class="min-w-full text-sm">
        <thead class="bg-gray-50">
          <tr class="text-left border-b">
            <th class="px-4 py-3">Gambar</th>
            <th class="px-4 py-3">Nama Produk</th>
            <th class="px-4 py-3">Kategori</th>
            <th class="px-4 py-3">Deskripsi</th>
            <th class="px-4 py-3">Harga</th>
            <th class="px-4 py-3">Stok</th>
            <th class="px-4 py-3 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Row 1 -->
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-3">
              <img src="https://via.placeholder.com/80" class="w-16 h-16 rounded-lg object-cover" alt="">
            </td>
            <td class="px-4 py-3">Laptop Gaming XYZ</td>
            <td class="px-4 py-3">Elektronik</td>
            <td class="px-4 py-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum, numquam.</td>
            <td class="px-4 py-3">Rp 12.500.000</td>
            <td class="px-4 py-3">15</td>
            <td class="px-4 py-3 text-right space-x-2">
              <button class="px-3 py-1 bg-yellow-500 text-white rounded-lg">Edit</button>
              <button class="px-3 py-1 bg-red-600 text-white rounded-lg">Delete</button>
            </td>
          </tr>
          <!-- Row 2 -->
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-3">
              <img src="https://via.placeholder.com/80" class="w-16 h-16 rounded-lg object-cover" alt="">
            </td>
            <td class="px-4 py-3">Kaos Polos Premium</td>
            <td class="px-4 py-3">Pakaian</td>
            <td class="px-4 py-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</td>
            <td class="px-4 py-3">Rp 120.000</td>
            <td class="px-4 py-3">50</td>
            <td class="px-4 py-3 text-right space-x-2">
              <button class="px-3 py-1 bg-yellow-500 text-white rounded-lg">Edit</button>
              <button class="px-3 py-1 bg-red-600 text-white rounded-lg">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center text-sm text-gray-600">
      <p>Menampilkan 1 - 10 dari 25 produk</p>
      <div class="flex gap-2">
        <a href="#" class="px-3 py-1 rounded-lg border">Prev</a>
        <a href="#" class="px-3 py-1 rounded-lg bg-blue-600 text-white">1</a>
        <a href="#" class="px-3 py-1 rounded-lg border">2</a>
        <a href="#" class="px-3 py-1 rounded-lg border">Next</a>
      </div>
    </div>
  </div>
@endsection
