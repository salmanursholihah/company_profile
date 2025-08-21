@extends('layouts.app_landing')

@section('title', ucfirst(str_replace('-', ' ', $slug)))

@push('styles')
<style>
    .main-image { width: 100%; height: 400px; object-fit: cover; border-radius: 12px; }
    .product-gallery { display: flex; gap: 10px; margin-top: 15px; }
    .product-gallery img { width: 80px; height: 80px; object-fit: cover; border-radius: 8px; cursor: pointer; border: 2px solid transparent; }
    .product-gallery img:hover { border-color: #0d6efd; }
    .old-price { text-decoration: line-through; color: #888; margin-right: 10px; }
    .price { font-size: 1.5rem; font-weight: bold; color: #28a745; }
    .discount-badge { background: #dc3545; color: white; padding: 5px 10px; border-radius: 6px; font-size: 0.9rem; }
</style>
@endpush

@section('content')
<main class="main container py-5">

    <div class="row mb-5">
        <!-- Gambar -->
        <div class="col-md-6 text-center">
            <img id="mainImage" src="{{ asset('assets/img/product1.jpg') }}" class="main-image mb-3" alt="Produk Contoh">
            <div class="product-gallery">
                <img src="{{ asset('assets/img/product1.jpg') }}" onclick="document.getElementById('mainImage').src=this.src">
                <img src="{{ asset('assets/img/product2.jpg') }}" onclick="document.getElementById('mainImage').src=this.src">
                <img src="{{ asset('assets/img/product3.jpg') }}" onclick="document.getElementById('mainImage').src=this.src">
            </div>
        </div>

        <!-- Detail -->
        <div class="col-md-6">
            <h2 class="fw-bold">Produk Contoh</h2>
            <div class="d-flex align-items-center my-3">
                <span class="old-price">Rp 200.000</span>
                <span class="price">Rp 160.000</span>
                <span class="discount-badge">-20%</span>
            </div>
            <p class="lead">Produk ini dibuat dengan material premium, nyaman digunakan, cocok untuk kebutuhan sehari-hari Anda.</p>

            <h5>📍 Lokasi Pembelian</h5>
            <p>Jakarta, Indonesia</p>
            <a href="https://www.google.com/maps/search/?api=1&query=Jakarta+Indonesia" target="_blank" class="btn btn-outline-primary btn-sm">Lihat di Google Maps</a>

            <div class="mt-4">
                <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan Produk Contoh" class="btn btn-success me-2">💬 WhatsApp</a>
                <a href="mailto:info@company.com" class="btn btn-primary">✉️ Email</a>
            </div>
        </div>
    </div>

    <!-- Deskripsi -->
    <div class="mb-5">
        <h3 class="fw-bold mb-3">Tentang Produk</h3>
        <p>Produk contoh ini dirancang dengan detail yang sempurna, menghadirkan kenyamanan dan daya tahan tinggi. Tersedia dalam berbagai ukuran dan warna. Cocok digunakan untuk aktivitas sehari-hari maupun acara spesial.</p>
    </div>

    <!-- Produk Terkait -->
    <div>
        <h3 class="fw-bold mb-4">Produk Terkait</h3>
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('assets/img/product2.jpg') }}" class="card-img-top" alt="Produk 2">
                    <div class="card-body text-center">
                        <h6 class="fw-bold">Produk Kedua</h6>
                        <a href="{{ route('product.show','produk-kedua') }}" class="btn btn-sm btn-outline-secondary">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
