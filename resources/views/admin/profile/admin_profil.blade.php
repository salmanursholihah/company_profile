@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="max-w-6xl mx-auto py-10 px-4">
    
    <!-- Profile Card -->
    <div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-6">
        <img src="https://via.placeholder.com/120" alt="Admin" class="w-28 h-28 rounded-full object-cover">
        <div class="flex-1">
            <h2 class="text-2xl font-bold text-gray-800">Admin Utama</h2>
            <p class="text-gray-500">admin@company.com</p>
            <p class="mt-2 text-sm text-gray-600">Super Admin dengan akses penuh ke sistem.</p>

            <!-- Optional Additional Info -->
            <div class="mt-4 space-y-1 text-sm text-gray-500">
                <p>Role: Super Admin</p>
                <p>Terdaftar: 01 Januari 2025</p>
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.profile.update') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Update Profile
                </a>
            </div>
        </div>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-10">
      <div class="bg-blue-500 text-white p-6 rounded-2xl shadow hover:scale-105 transform transition">
        <h3 class="text-lg">Total Users</h3>
        <p class="text-3xl font-bold mt-2">1,245</p>
      </div>
      <div class="bg-green-500 text-white p-6 rounded-2xl shadow hover:scale-105 transform transition">
        <h3 class="text-lg">Total Vendors</h3>
        <p class="text-3xl font-bold mt-2">78</p>
      </div>
      <div class="bg-purple-500 text-white p-6 rounded-2xl shadow hover:scale-105 transform transition">
        <h3 class="text-lg">Total Produk</h3>
        <p class="text-3xl font-bold mt-2">560</p>
      </div>
    </div>

    <!-- Aksi -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bg-white p-6 shadow rounded-2xl hover:shadow-lg transition">
        <h3 class="text-xl font-semibold mb-4">Manajemen User</h3>
        <ul class="space-y-2 text-gray-600 list-disc list-inside">
          <li>Tambah User Baru</li>
          <li>Kelola Role & Permissions</li>
          <li>Monitoring Aktivitas</li>
        </ul>
      </div>
      <div class="bg-white p-6 shadow rounded-2xl hover:shadow-lg transition">
        <h3 class="text-xl font-semibold mb-4">Pengaturan Sistem</h3>
        <ul class="space-y-2 text-gray-600 list-disc list-inside">
          <li>Backup & Restore</li>
          <li>Pengaturan Aplikasi</li>
          <li>Integrasi API</li>
        </ul>
      </div>
    </div>

</div>

@endsection
