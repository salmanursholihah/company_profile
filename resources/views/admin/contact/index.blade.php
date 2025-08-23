
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
  <!-- Container -->
  <div class="max-w-7xl mx-auto px-4 py-8 space-y-6">

    <!-- Tabel Produk -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">
      <table class="min-w-full text-sm">
        <thead class="bg-gray-50">
          <tr class="text-left border-b">
            <th class="px-4 py-3">name</th>
            <th class="px-4 py-3">email</th>
            <th class="px-4 py-3">subject</th>
            <th class="px-4 py-3">message</th>
            <th class="px-4 py-3 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Row 1 -->
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-3">
              <img src="https://via.placeholder.com/80" class="w-16 h-16 rounded-lg object-cover" alt="">
            </td>
            <td class="px-4 py-3">mimin sarimin</td>
            <td class="px-4 py-3">mimin@gmail.com</td>
            <td class="px-4 py-3">Lorem ipsum dolor sit amet.</td>
            <td class="px-4 py-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus dolore velit, dolor deleniti suscipit reprehenderit at voluptas nihil earum sint.</td>
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
            <td class="px-4 py-3">ucup suracup</td>
            <td class="px-4 py-3">ucup@gmail.com</td>
            <td class="px-4 py-3">Lorem, ipsum dolor.</td>
            <td class="px-4 py-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae aperiam vel quia. Accusamus eaque maxime corrupti ab.</td>
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