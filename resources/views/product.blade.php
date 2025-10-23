@extends('layouts.app_landing')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/style_katalog.css') }}">
<style>
    .e-katalog-page h1{
        text-align:center;
        margin-bottom:25px;
        font-size:26px;
        color:#12385b;
    }

    .catalog {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 18px;
    }

    .product-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.08);
        overflow: hidden;
        text-align: center;
        transition: all 0.25s ease;
        border: 1px solid #f2f2f2;
    }

    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

    .product-card img {
        width: 100%;
        height: 160px;
        object-fit: cover;
    }

    .product-title {
        font-size: 1rem;
        font-weight: 600;
        margin: 8px 0 5px;
        color: #2b2b2b;
        min-height: 45px;
        padding: 0 10px;
    }

    .product-price {
        font-size: 0.9rem;
        margin-bottom: 5px;
    }

    .old-price {
        font-size: 0.85rem;
        text-decoration: line-through;
        color: #999;
        margin-right: 5px;
    }

    .new-price {
        color: #e63946;
        font-weight: bold;
        font-size: 1rem;
    }

    .discount {
        color: #2a9d8f;
        font-size: 0.85rem;
    }

    .location {
        font-size: 0.85rem;
        color: #555;
        padding-bottom: 8px;
    }

    .btn-group {
        display: flex;
        justify-content: center;
        gap: 6px;
        padding: 10px;
        border-top: 1px solid #eee;
    }

    .btn, .btnn {
        display: inline-block;
        padding: 6px 12px;
        font-size: 0.8rem;
        border-radius: 5px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn {
        background: #2a9d8f;
        color: white;
    }
    .btn:hover {
        background: #21867a;
    }

    .btnn {
        background: #264653;
        color: white;
    }
    .btnn:hover {
        background: #1a2e38;
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
