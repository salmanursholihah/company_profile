@extends('layouts.app_landing')

<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background">
    <div class="container position-relative">
      <h1>Product Catalog</h1>
            <p>solusi terpercaya pengelolaan limbah cair yang ramah lingkungan</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class="current">Catalog</li>
        </ol>
      </nav>
    </div>
  </div>


  <!-- Catalog Section -->
  <section id="catalog" class="catalog section py-5">
    <div class="container">

      {{-- Filter Perusahaan --}}
      @php
        $companies = ['Company A', 'Company B', 'Company C'];
      @endphp
      <div class="d-flex justify-content-center mb-4">
        <ul class="catalog-filters list-inline isotope-filters" data-aos="fade-up">
          <li class="list-inline-item me-2" data-filter="*" class="filter-active btn btn-outline-primary">All Companies</li>
          @foreach($companies as $company)
            <li class="list-inline-item me-2 btn btn-outline-primary" data-filter=".{{ Str::slug($company) }}">{{ $company }}</li>
          @endforeach
        </ul>
      </div>

      {{-- Produk --}}
      @php
        $products = [
          ['company'=>'Company A','name'=>'Product A1','desc'=>'Deskripsi singkat Product A1','price'=>'1.500.000','img'=>'gambar1.png'],
          ['company'=>'Company A','name'=>'Product A2','desc'=>'Deskripsi singkat Product A2','price'=>'2.200.000','img'=>'gambar2.png'],
          ['company'=>'Company B','name'=>'Product B1','desc'=>'Deskripsi singkat Product B1','price'=>'1.800.000','img'=>'gambar3.png'],
          ['company'=>'Company C','name'=>'Product C1','desc'=>'Deskripsi singkat Product C1','price'=>'2.500.000','img'=>'gambar4.png'],
          ['company'=>'Company A','name'=>'Product A21','desc'=>'Deskripsi singkat Product A21','price'=>'1.500.000','img'=>'gambar5.png'],
          ['company'=>'Company A','name'=>'Product A22','desc'=>'Deskripsi singkat Product A22','price'=>'2.200.000','img'=>'gambar6.png'],
          ['company'=>'Company B','name'=>'Product B21','desc'=>'Deskripsi singkat Product B21','price'=>'1.800.000','img'=>'gambar7.png'],
          ['company'=>'Company C','name'=>'Product C21','desc'=>'Deskripsi singkat Product C21','price'=>'2.500.000','img'=>'gambar8.png'],
          ['company'=>'Company A','name'=>'Product A211','desc'=>'Deskripsi singkat Product A211','price'=>'1.500.000','img'=>'gambar9.png'],
          ['company'=>'Company A','name'=>'Product A212','desc'=>'Deskripsi singkat Product A212','price'=>'2.200.000','img'=>'gambar10.png'],
          ['company'=>'Company B','name'=>'Product B211','desc'=>'Deskripsi singkat Product B211','price'=>'1.800.000','img'=>'gambar11.png'],
          ['company'=>'Company C','name'=>'Product C211','desc'=>'Deskripsi singkat Product C211','price'=>'2.500.000','img'=>'gambar12.png'],
          // Tambahkan produk lainnya
        ];
      @endphp

      <div class="row g-4 isotope-container" data-aos="fade-up">
        @foreach($products as $product)
          <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ Str::slug($product['company']) }}">
            <div class="card h-100 shadow-sm border-0">
              <img src="{{ asset('assets/img/katalog/'.$product['img']) }}" class="card-img-top" alt="{{ $product['name'] }}">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $product['name'] }}</h5>
                <p class="card-text">{{ $product['desc'] }}</p>
                <p class="fw-bold">Price: Rp {{ $product['price'] }}</p>

                {{-- Info tambahan --}}
                <details class="mt-auto">
                  <summary class="text-primary fw-bold cursor-pointer">Detail Layanan & Fitur</summary>
                  <ul class="mt-2 ps-3">
                    <li>🚚 Biaya pengiriman: Gratis Pulau Jawa & Sumatera</li>
                    <li>🏗 Konstruksi penunjang IPAL</li>
                    <li>⚙ Uji fungsi</li>
                    <li>💰 Pajak sudah termasuk</li>
                    <li>👷‍♂️ Pendampingan & training operator</li>
                    <li>🔧 Instalasi alat</li>
                  </ul>
                </details>

                <a href="{{ asset('assets/img/katalog/'.$product['img']) }}" class="btn btn-outline-primary mt-3 glightbox" title="{{ $product['name'] }}">
                  <i class="bi bi-zoom-in"></i> Preview
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </section>

  <!-- Contact Info -->
  <section class="contact-info bg-light py-4">
    <div class="container text-center">
      <h5>Hubungi Kami</h5>
      <p>📞 +62 711 419005 | +62 859 3281 8611</p>
      <p>✉️ utamacta@gmail.com</p>
    </div>
  </section>

</main>
