@extends('layouts.admin')

@section('title', 'Profile Admin')

@section('content')
<div class="space-y-6">

    <!-- Profile Card -->
    <div class="bg-white p-6 rounded-xl shadow flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-xl font-bold">Admin Utama</h3>
            <p class="text-gray-600">admin@company.com</p>
            <p class="text-sm text-gray-500 mt-2">Super Admin dengan akses penuh ke sistem.</p>
            <p class="text-sm text-gray-500 mt-1">Role: <span class="font-medium">Super Admin</span></p>
            <p class="text-sm text-gray-500">Terdaftar: 01 Januari 2025</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('admin.profile.admin_profile') }}" 
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                Update Profile
            </a>
        </div>
    </div>

    <!-- Statistik -->
    <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-blue-500 text-white p-6 rounded-xl shadow">
            <p class="text-sm">Total Users</p>
            <p class="text-2xl font-bold">1,245</p>
        </div>
        <div class="bg-green-500 text-white p-6 rounded-xl shadow">
            <p class="text-sm">Total Vendors</p>
            <p class="text-2xl font-bold">78</p>
        </div>
        <div class="bg-purple-500 text-white p-6 rounded-xl shadow">
            <p class="text-sm">Total Produk</p>
            <p class="text-2xl font-bold">560</p>
        </div>
    </div>

    <!-- Informasi Sistem -->
    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-xl shadow">
            <h4 class="font-semibold mb-3">Manajemen User</h4>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
                <li>Tambah User Baru</li>
                <li>Kelola Role & Permissions</li>
                <li>Monitoring Aktivitas</li>
            </ul>
        </div>
        <div class="bg-white p-6 rounded-xl shadow">
            <h4 class="font-semibold mb-3">Pengaturan Sistem</h4>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
                <li>Backup & Restore</li>
                <li>Pengaturan Aplikasi</li>
                <li>Integrasi API</li>
            </ul>
        </div>
    </div>

</div>
@endsection
