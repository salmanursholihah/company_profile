@extends('layouts.app_landing')

@section('title', 'Company Profile')

@section('content')
<main class="main">

    <!-- Hero -->
    <section class="hero text-center py-5 bg-light">
        <div class="container">
            <h1 class="fw-bold">Selamat Datang di Perusahaan Kami</h1>
            <p>Solusi terbaik untuk kebutuhan Anda</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Lihat Produk</a>
        </div>
    </section>

    <!-- Produk Unggulan -->
    <section id="produk" class="products py-5">
        <div class="container text-center">
            <h2>Produk Unggulan</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/product1.jpg') }}" class="img-fluid rounded mb-3" alt="Produk 1">
                    <h5>Produk Contoh</h5>
                    <p>Rp 160.000</p>
                    <a href="{{ route('product.show','produk-contoh') }}" class="btn btn-outline-primary">Lihat Detail</a>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/product2.jpg') }}" class="img-fluid rounded mb-3" alt="Produk 2">
                    <h5>Produk Kedua</h5>
                    <p>Rp 250.000</p>
                    <a href="{{ route('product.show','produk-kedua') }}" class="btn btn-outline-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection