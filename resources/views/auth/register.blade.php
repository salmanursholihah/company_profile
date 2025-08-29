@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<form action="{{ route('register') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block text-gray-700">Nama</label>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2" required>
        @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
    </div>
    <div>
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2" required>
        @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
    </div>
    <div>
        <label class="block text-gray-700">Password</label>
        <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        @error('password')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
    </div>
    <div>
        <label class="block text-gray-700">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
    </div>
    <div>
        <label class="block text-gray-700">Role</label>
        <select name="role" class="w-full border rounded px-3 py-2" required>
            <option value="admin" {{ old('role')=='super_admin'?'selected':'' }}>Admin</option>
            <option value="vendor" {{ old('role')=='vendor'?'selected':'' }}>Vendor</option>
        </select>
    </div>
    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Register</button>
    <p class="text-center text-sm text-gray-500 mt-2">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600">Login</a>
    </p>
</form>
@endsection
