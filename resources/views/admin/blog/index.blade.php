@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

  <!-- Container -->
  <div class="max-w-7xl mx-auto px-4 py-8 space-y-6">

    <!-- Filter/Search Bar -->
    <div class="bg-white p-4 rounded-xl shadow flex flex-col md:flex-row md:items-center md:justify-between gap-3">
      <div class="flex gap-2">
        <input type="text" placeholder="Cari judul..." class="border rounded-lg px-3 py-2 w-64">
        <select class="border rounded-lg px-3 py-2">
          <option>Status</option>
          <option>Published</option>
          <option>Draft</option>
        </select>
        <select class="border rounded-lg px-3 py-2">
          <option>Urutkan</option>
          <option>Terbaru</option>
          <option>Terlama</option>
        </select>
      </div>
      <button class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">Terapkan</button>
    </div>

    <!-- Tabel Blog -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">
      <table class="min-w-full text-sm">
        <thead class="bg-gray-50">
          <tr class="text-left border-b">
            <th class="px-4 py-3">Judul</th>
            <th class="px-4 py-3">Author</th>
            <th class="px-4 py-3">Kategori</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Views</th>
            <th class="px-4 py-3">Tanggal</th>
            <th class="px-4 py-3 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Row 1 -->
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-3">Belajar Laravel Dasar</td>
            <td class="px-4 py-3">Admin</td>
            <td class="px-4 py-3">Programming</td>
            <td class="px-4 py-3">
              <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700">Published</span>
            </td>
            <td class="px-4 py-3">152</td>
            <td class="px-4 py-3">20 Agu 2025</td>
            <td class="px-4 py-3 text-right space-x-2">
              <button class="px-3 py-1 bg-yellow-500 text-white rounded-lg">Edit</button>
              <button class="px-3 py-1 bg-red-600 text-white rounded-lg">Delete</button>
            </td>
          </tr>
          <!-- Row 2 -->
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-3">Tips Desain UI Modern</td>
            <td class="px-4 py-3">Salma</td>
            <td class="px-4 py-3">Design</td>
            <td class="px-4 py-3">
              <span class="px-2 py-1 rounded-full text-xs bg-gray-200 text-gray-800">Draft</span>
            </td>
            <td class="px-4 py-3">89</td>
            <td class="px-4 py-3">15 Agu 2025</td>
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
      <p>Menampilkan 1 - 10 dari 25</p>
      <div class="flex gap-2">
        <a href="#" class="px-3 py-1 rounded-lg border">Prev</a>
        <a href="#" class="px-3 py-1 rounded-lg bg-blue-600 text-white">1</a>
        <a href="#" class="px-3 py-1 rounded-lg border">2</a>
        <a href="#" class="px-3 py-1 rounded-lg border">Next</a>
      </div>
    </div>
  </div>

@endsection