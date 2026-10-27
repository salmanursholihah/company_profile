@extends('layouts.auth_modern')

@section('title', 'Login')
@section('heading', 'Selamat datang kembali')
@section('subheading', 'Masuk dengan email dan password Anda untuk membuka panel admin.')
@section('pitch', 'Kelola konten website dengan mudah.')

@section('content')
    <form action="{{ route('login') }}" method="POST" data-auth novalidate>
        @csrf

        <div class="au-field">
            <label for="email">Email</label>
            <div class="au-input">
                <svg class="lead" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@perusahaan.com"
                    autocomplete="username" inputmode="email" autocapitalize="none" required autofocus
                    class="{{ $errors->has('email') ? 'is-bad' : '' }}">
            </div>
            @error('email')<span class="au-err">{{ $message }}</span>@enderror
        </div>

        <div class="au-field">
            <label for="password">Password</label>
            <div class="au-input">
                <svg class="lead" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></svg>
                <input type="password" id="password" name="password" placeholder="Masukkan password"
                    autocomplete="current-password" required class="{{ $errors->has('password') ? 'is-bad' : '' }}">
                <button type="button" class="au-eye" data-eye="password" aria-label="Tampilkan password">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
            </div>
            @error('password')<span class="au-err">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="au-btn"><span class="au-spin"></span><span>Masuk</span></button>
    </form>
@endsection

@section('switch')
    Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
@endsection
