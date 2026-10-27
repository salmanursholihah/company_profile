@extends('layouts.auth_modern')

@section('title', 'Daftar')
@section('heading', 'Buat akun baru')
@section('subheading', 'Daftar sebagai vendor untuk mulai mengelola produk Anda.')
@section('pitch', 'Bergabung dan kelola produk Anda sendiri.')
@section('pitch_sub', 'Akun vendor dapat mengelola produk dan profil dari satu tempat.')

@section('content')
    <form action="{{ route('register') }}" method="POST" data-auth novalidate>
        @csrf

        <div class="au-field">
            <label for="name">Nama lengkap</label>
            <div class="au-input">
                <svg class="lead" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Anda" autocomplete="name" required autofocus
                    class="{{ $errors->has('name') ? 'is-bad' : '' }}">
            </div>
            @error('name')<span class="au-err">{{ $message }}</span>@enderror
        </div>

        <div class="au-field">
            <label for="email">Email</label>
            <div class="au-input">
                <svg class="lead" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@perusahaan.com"
                    autocomplete="email" inputmode="email" autocapitalize="none" required class="{{ $errors->has('email') ? 'is-bad' : '' }}">
            </div>
            @error('email')<span class="au-err">{{ $message }}</span>@enderror
        </div>

        <div class="au-field">
            <label for="password">Password</label>
            <div class="au-input">
                <svg class="lead" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></svg>
                <input type="password" id="password" name="password" placeholder="Minimal 6 karakter" autocomplete="new-password" required
                    class="{{ $errors->has('password') ? 'is-bad' : '' }}">
                <button type="button" class="au-eye" data-eye="password" aria-label="Tampilkan password">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
            </div>
            @error('password')<span class="au-err">{{ $message }}</span>@enderror
        </div>

        <div class="au-field">
            <label for="password_confirmation">Konfirmasi password</label>
            <div class="au-input">
                <svg class="lead" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></svg>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" autocomplete="new-password" required>
                <button type="button" class="au-eye" data-eye="password_confirmation" aria-label="Tampilkan password">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
            </div>
        </div>

        <button type="submit" class="au-btn"><span class="au-spin"></span><span>Daftar</span></button>
    </form>
@endsection

@section('switch')
    Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
@endsection
