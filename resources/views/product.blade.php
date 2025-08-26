@extends('layouts.app_landing')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/style_katalog.css') }}">
<style>
    .catalog {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .product-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        overflow: hidden;
        text-align: center;
        transition: transform 0.2s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-card img {
        width: 100%;
        height: 200px; /* semua gambar dipaksa sama tinggi */
        object-fit: cover; /* crop agar proporsional */
        border-bottom: 1px solid #eee;
    }

    .product-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin: 10px 0;
    }

    .product-price {
        margin: 5px 0;
    }

    .old-price {
        text-decoration: line-through;
        color: #888;
        margin-right: 5px;
    }

    .new-price {
        color: #e63946;
        font-weight: bold;
    }

    .discount {
        color: #2a9d8f;
        font-size: 0.9rem;
        margin-left: 5px;
    }

    .location {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 10px;
    }

    .btn-group {
        display: flex;
        justify-content: center;
        gap: 10px;
        padding: 10px;
    }

    .btn, .btnn {
        background: #2a9d8f;
        color: white;
        padding: 8px 14px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: background 0.3s;
    }

    .btnn {
        background: #264653;
    }

    .btn:hover {
        background: #21867a;
    }

    .btnn:hover {
        background: #1c3440;
    }
</style>
@endpush

<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Product</h1>
            <p>Solusi terpercaya pengelolaan limbah cair yang ramah lingkungan</p>
            <nav class="breadcrumbs">
                <ol>
                    <li class="current">Home</li>
                    <li class="current">Product</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="e-katalog-page">
        <h1>Katalog Produk</h1>
        <div class="catalog">
            @forelse($products as $product)
                <div class="product-card">
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">

                    <div class="product-title">{{ $product->name }}</div>
                    <div class="product-price">
                        @if($product->discount)
                            <span class="old-price">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="new-price">Rp{{ number_format($product->price - ($product->price * $product->discount / 100), 0, ',', '.') }}</span>
                            <span class="discount">(-{{ $product->discount }}%)</span>
                        @else
                            <span class="new-price">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                        @endif
                    </div>
                    <div class="location">{{ $product->lokasi }}</div>
                    <div class="btn-group">
                        <a href="https://wa.me/6281234567890" class="btn">
                            <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
                        </a>
                        <a href="https://milospro.com/" class="btnn">
                            <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada produk tersedia.</p>
            @endforelse
        </div>
    </div>
</main>
