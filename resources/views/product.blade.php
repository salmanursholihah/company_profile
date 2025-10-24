@extends('layouts.app_landing')

@push('styles')
<style>
    .e-katalog-page {
        padding: 50px 0;
        background: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .catalog {
        max-width: 1200px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .product-card {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        background: white;
        border: 1px solid #eee;
        cursor: pointer;
        transition: 0.3s;
    }

    .product-card img {
        width: 100%;
        height: 230px;
        object-fit: cover;
        display: block;
    }

    .product-name {
        padding: 12px;
        text-align: center;
        font-weight: 600;
        color: #333;
        background: #fff;
        border-top: 1px solid #eee;
    }

    /* Overlay tombol */
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.55);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 12px;
        opacity: 0;
        visibility: hidden;
        transition: 0.3s;
    }

    .overlay a {
        padding: 10px 18px;
        text-decoration: none;
        border-radius: 6px;
        border: 1px solid #fff;
        color: white;
        background: transparent;
        transition: 0.3s;
    }

    .overlay a:hover {
        background: #1f8f85;
        border-color: #1f8f85;
    }

    .product-card.active .overlay {
        opacity: 1;
        visibility: visible;
    }
</style>
@endpush


<main class="main">

    <!-- Header halaman -->
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
        <h1 class="text-center mb-4">Katalog Produk</h1>

        <div class="catalog">
            @forelse($products as $product)
                <div class="product-card" onclick="toggleOverlay(this)">
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                    <div class="overlay">
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk%20{{ urlencode($product->name) }}"
                           target="_blank">Hubungi Kami</a>
                        <a href="#" target="_blank">Kunjungi Toko</a>
                    </div>
                    <div class="product-name">{{ $product->name }}</div>
                </div>
            @empty
                <p class="text-center">Belum ada produk.</p>
            @endforelse
        </div>
    </div>

</main>