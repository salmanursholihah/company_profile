@extends('layouts.app_landing')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/style_katalog_index.css') }}">

@endpush

<main class="main">


    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <!-- <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in"> -->

      <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="container position-relative">

          <div class="carousel-item active">
            <div class="carousel-container">
              <h2>Welcome to Utama cipta tata asri</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started">Read More</a>
            </div>
          </div><!-- End Carousel Item -->

          <div class="carousel-item">
            <div class="carousel-container">
              <h2>Lorem Ipsum Dolor</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started">Read More</a>
            </div>
          </div><!-- End Carousel Item -->

          <div class="carousel-item">
            <div class="carousel-container">
              <h2>Sequi ea ut et est quaerat</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started">Read More</a>
            </div>
          </div><!-- End Carousel Item -->

          <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
          </a>

          <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
          </a>

          <ol class="carousel-indicators"></ol>

        </div>

      </div>

    </section><!-- /Hero Section -->



    <!-- Quick Services Section -->
    <section id="quick-services" class="section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 data-aos="fade-up">Layanan Unggulan Kami</h2>
                <p data-aos="fade-up" data-aos-delay="100">Kami menyediakan solusi lengkap, efisien dan ramah
                    lingkungan.</p>
            </div>

            <div class="row g-4">
                @php
                $services = [
                ['icon'=>'bi-gear', 'title'=>'Design Engineering', 'desc'=>'Solusi rekayasa mesin dan sistem pengolahan
                limbah.','color'=>'bg-primary'],
                ['icon'=>'bi-truck', 'title'=>'Pengiriman Cepat', 'desc'=>'Gratis pengiriman Pulau Jawa &
                Sumatera.','color'=>'bg-success'],
                ['icon'=>'bi-award', 'title'=>'Kualitas Terjamin', 'desc'=>'Produk sudah teruji dan terinstal di
                berbagai instansi.','color'=>'bg-warning'],
                ['icon'=>'bi-people', 'title'=>'Pendampingan & Training', 'desc'=>'Pelatihan operator dan dukungan
                pasca-instalasi.','color'=>'bg-danger'],
                ];
                @endphp

                @foreach($services as $service)
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card shadow-sm h-100 border-0 text-center p-3">
                        <div class="icon mb-3 {{ $service['color'] }} rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width:60px;height:60px;">
                            <i class="bi {{ $service['icon'] }} text-white fs-3"></i>
                        </div>
                        <h5 class="card-title">{{ $service['title'] }}</h5>
                        <p class="card-text">{{ $service['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- /Quick Services Section -->

    <!-- About Section -->
    <section id="about" class="section py-5">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid rounded shadow" alt="About Us">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2>Selayang Pandang</h2>
                    <p>
                        PT Utama Cipta Tata Asri bergerak di bidang Design Engineering & Manufacturing dengan fokus
                        lingkungan. Kami mengkhususkan pada mesin pengolah limbah cair medis.
                    </p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check2-circle text-primary me-2"></i>Instalasi cepat & handal</li>
                        <li><i class="bi bi-check2-circle text-primary me-2"></i>Pelatihan operator & pendampingan</li>
                        <li><i class="bi bi-check2-circle text-primary me-2"></i>Produk ramah lingkungan & hemat energi
                        </li>
                    </ul>
                    <a href="#featured-products" class="btn btn-outline-primary mt-3">Lihat Produk</a>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    <!-- Featured Products Section -->
    <section id="featured-products" class="section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 data-aos="fade-up">Produk Best Seller</h2>
                <p data-aos="fade-up" data-aos-delay="100">Solusi inovatif kami yang banyak diminati instansi medis &
                    swasta.</p>
            </div>

            <div class="row g-4">
                @php
                $products = [
                ['img'=>'ipal_1m3.png','title'=>'IPAL WT PRO 0041 KAP.1m3','desc'=>'Kapasitas 1m3, cocok untuk lahan
                terbatas.'],
                ['img'=>'features-2.svg','title'=>'IPAL WT PRO 004i 3.5 m3','desc'=>'Dengan solar cell hybrid off-grid,
                hemat energi.'],
                ['img'=>'features-3.svg','title'=>'IPAL Model 003X','desc'=>'Efisiensi tinggi & mudah dipasang.'],
                ['img'=>'features-4.svg','title'=>'IPAL Model 005Y','desc'=>'Kualitas teruji, tahan lama, ramah
                lingkungan.'],
                ];
                @endphp

                @foreach($products as $product)
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card h-100 shadow-sm border-0 text-center">
                        <img src="{{ asset('assets/img/'.$product['img']) }}" class="card-img-top"
                            alt="{{ $product['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['title'] }}</h5>
                            <p class="card-text">{{ $product['desc'] }}</p>
                            <a href="{{ asset('assets/img/'.$product['img']) }}"
                                class="btn btn-outline-primary glightbox">Preview</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- /Featured Products Section -->




    <!-- Featured Products sparepart Section -->
    <section id="featured-products" class="section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 data-aos="fade-up">Produk </h2>
                <p data-aos="fade-up" data-aos-delay="100">Solusi inovatif kami yang banyak diminati instansi medis &
                    swasta.</p>
            </div>

            @php
            $products = [
            ['img' => 'app-1.jpg', 'title' => 'Eiger Civilian Hat', 'old' => 'Rp179.000', 'new' => 'Rp143.200',
            'discount' => '-20%', 'location' => 'Bandung, Indonesia'],
            ['img' => 'app-2.jpg', 'title' => 'Tas Gunung 45L', 'old' => 'Rp650.000', 'new' => 'Rp520.000', 'discount'
            => '-20%', 'location' => 'Jakarta, Indonesia'],
            ['img' => 'app-3.jpg', 'title' => 'Sepatu Hiking', 'old' => 'Rp899.000', 'new' => 'Rp720.000', 'discount' =>
            '-20%', 'location' => 'Surabaya, Indonesia'],
            ['img' => 'app-3.jpg', 'title' => 'Jaket Outdoor', 'old' => 'Rp450.000', 'new' => 'Rp360.000', 'discount' =>
            '-20%', 'location' => 'Bandung, Indonesia'],
            ];
            @endphp

            <div class="catalog">
                @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ asset('assets/img/portfolio/' . $product['img']) }}" alt="">
                    <div class="product-title">{{ $product['title'] }}</div>
                    <div class="product-price">
                        <span class="old-price">{{ $product['old'] }}</span>
                        <span class="new-price">{{ $product['new'] }}</span>
                        <span class="discount">({{ $product['discount'] }})</span>
                    </div>
                    <div class="location">{{ $product['location'] }}</div>
                    <div class="btn-group">
                        <a href="https://wa.me/6281234567890" class="btn">
                            <i class="fa-solid fa-phone-volume"></i> Hubungi Kami
                        </a>
                        <a href="https://milospro.com/" class="btnn">
                            <i class="fa-solid fa-bag-shopping"></i> Kunjungi Toko Kami
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- /Featured Products sparepart Section -->




</main>