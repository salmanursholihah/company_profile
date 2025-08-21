 @extends('layouts.app_landing')

 @push('styles')

 <link rel="stylesheet" href="{{ asset('assets/css/style_katalog.css') }}">
   
 @endpush

 <main class="main">

     <!-- Page Title -->
     <div class="page-title dark-background">
         <div class="container position-relative">
             <h1>product</h1>
            <p>solusi terpercaya pengelolaan limbah cair yang ramah lingkungan</p>
             <nav class="breadcrumbs">
                 <ol>
                     <li><a href="index.html">Home</a></li>
                     <li class="current">Product</li>
                 </ol>
             </nav>
         </div>
     </div><!-- End Page Title -->


<div class="e-katalog-page">
    <h1>Katalog Produk</h1>

    <div class="catalog">
        <!-- Produk 1 -->
        <div class="product-card">
            <img src="{{ asset('assets/img/portfolio/app-1.jpg') }}" alt="">
            <div class="product-title">Eiger Civilian Hat</div>
            <div class="product-price">
                <span class="old-price">Rp179.000</span>
                <span class="new-price">Rp143.200</span>
                <span class="discount">(-20%)</span>
            </div>
            <div class="location">Bandung, Indonesia</div>
  <div class="btn-group">
    <a href="https://wa.me/6281234567890" class="btn">
        <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
    </a>
    <a href="https://milospro.com/" class="btnn">
        <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
    </a>
</div>
       </div>

        <!-- Produk 2 -->
       <div class="product-card">
    <img src="{{ asset('assets/img/portfolio/app-2.jpg') }}" alt="">
    <div class="product-title">Tas Gunung 45L</div>
    <div class="product-price">
        <span class="old-price">Rp650.000</span>
        <span class="new-price">Rp520.000</span>
        <span class="discount">(-20%)</span>
    </div>
    <div class="location">Jakarta, Indonesia</div>
  <div class="btn-group">
    <a href="https://wa.me/6281234567890" class="btn">
        <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
    </a>
    <a href="https://milospro.com/" class="btnn">
        <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
    </a>
</div>

</div>


        <!-- Produk 3 -->
        <div class="product-card">
            <img src="{{ asset('assets/img/portfolio/app-3.jpg') }}" alt="">
            <div class="product-title">Sepatu Hiking</div>
            <div class="product-price">
                <span class="old-price">Rp899.000</span>
                <span class="new-price">Rp720.000</span>
                <span class="discount">(-20%)</span>
            </div>
            <div class="location">Surabaya, Indonesia</div>
  <div class="btn-group">
    <a href="https://wa.me/6281234567890" class="btn">
        <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
    </a>
    <a href="https://milospro.com/" class="btnn">
        <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
    </a>
</div>
       </div>

        <!-- Produk 4 -->
        <div class="product-card">
            <img src="{{ asset('assets/img/portfolio/app-3.jpg') }}" alt="">
            <div class="product-title">Jaket Outdoor</div>
            <div class="product-price">
                <span class="old-price">Rp450.000</span>
                <span class="new-price">Rp360.000</span>
                <span class="discount">(-20%)</span>
            </div>
            <div class="location">Bandung, Indonesia</div>
  <div class="btn-group">
    <a href="https://wa.me/6281234567890" class="btn">
        <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
    </a>
    <a href="https://milospro.com/" class="btnn">
        <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
    </a>
</div>
       </div>
        <!-- Produk 1 -->
        <div class="product-card">
            <img src="{{ asset('assets/img/portfolio/app-1.jpg') }}" alt="">
            <div class="product-title">Eiger Civilian Hat</div>
            <div class="product-price">
                <span class="old-price">Rp179.000</span>
                <span class="new-price">Rp143.200</span>
                <span class="discount">(-20%)</span>
            </div>
            <div class="location">Bandung, Indonesia</div>
  <div class="btn-group">
    <a href="https://wa.me/6281234567890" class="btn">
        <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
    </a>
    <a href="https://milospro.com/" class="btnn">
        <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
    </a>
</div>
       </div>

        <!-- Produk 2 -->
       <div class="product-card">
    <img src="{{ asset('assets/img/portfolio/app-2.jpg') }}" alt="">
    <div class="product-title">Tas Gunung 45L</div>
    <div class="product-price">
        <span class="old-price">Rp650.000</span>
        <span class="new-price">Rp520.000</span>
        <span class="discount">(-20%)</span>
    </div>
    <div class="location">Jakarta, Indonesia</div>
  <div class="btn-group">
    <a href="https://wa.me/6281234567890" class="btn">
        <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
    </a>
    <a href="https://milospro.com/" class="btnn">
        <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
    </a>
</div>

</div>


        <!-- Produk 3 -->
        <div class="product-card">
            <img src="{{ asset('assets/img/portfolio/app-3.jpg') }}" alt="">
            <div class="product-title">Sepatu Hiking</div>
            <div class="product-price">
                <span class="old-price">Rp899.000</span>
                <span class="new-price">Rp720.000</span>
                <span class="discount">(-20%)</span>
            </div>
            <div class="location">Surabaya, Indonesia</div>
 <div class="btn-group">
    <a href="https://wa.me/6281234567890" class="btn">
        <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
    </a>
    <a href="https://milospro.com/" class="btnn">
        <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
    </a>
</div>
        </div>

        <!-- Produk 4 -->
        <div class="product-card">
            <img src="{{ asset('assets/img/portfolio/app-3.jpg') }}" alt="">
            <div class="product-title">Jaket Outdoor</div>
            <div class="product-price">
                <span class="old-price">Rp450.000</span>
                <span class="new-price">Rp360.000</span>
                <span class="discount">(-20%)</span>
            </div>
            <div class="location">Bandung, Indonesia</div>
  <div class="btn-group">
    <a href="https://wa.me/6281234567890" class="btn">
        <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
    </a>
    <a href="https://milospro.com/" class="btnn">
        <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
    </a>
</div>
       </div>
    </div>
</div>
</main>