@extends('layouts.app_landing')

@php
use Illuminate\Support\Str;
@endphp

<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background">
    <div class="container position-relative">
      <h1>Product Catalog</h1>
      <p>Solusi terpercaya pengelolaan limbah cair yang ramah lingkungan</p>
      <nav class="breadcrumbs">
        <ol>
          <li class="current">Home</li>
          <li class="current">Catalog</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- Catalog Section -->
  <section id="catalog" class="catalog section py-5">
    <div class="container">

      {{-- Filter Perusahaan --}}
      <div class="d-flex justify-content-center mb-4">
        <ul class="catalog-filters list-inline isotope-filters" data-aos="fade-up">
          <li class="list-inline-item me-2 filter-active btn btn-outline-primary" data-filter="*">All Companies</li>
          @foreach($companies ?? [] as $company)
            <li class="list-inline-item me-2 btn btn-outline-primary" data-filter=".{{ Str::slug($company) }}">
              {{ $company }}
            </li>
          @endforeach
        </ul>
      </div>

      {{-- Produk --}}
      <div class="row g-4 isotope-container" data-aos="fade-up">
        @forelse($products ?? [] as $product)
          <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ Str::slug($product->company) }}">
            <div class="card h-100 shadow-sm border-0">
              <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('assets/img/no-image.png') }}" 
                   class="card-img-top" alt="{{ $product->name }}">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->deskripsi }}</p>

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

                {{-- Preview --}}
                <a href="{{ $product->image ? asset('storage/'.$product->image) : '#' }}" 
                   class="btn btn-outline-primary mt-3 glightbox" 
                   title="{{ $product->name }}">
                  <i class="bi bi-zoom-in"></i> Preview
                </a>

              </div>
            </div>
          </div>
        @empty
          <p class="text-center">Belum ada produk tersedia.</p>
        @endforelse
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

@push('scripts')
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var iso = new Isotope('.isotope-container', {
      itemSelector: '.isotope-item',
      layoutMode: 'fitRows'
    });

    // filter buttons
    document.querySelectorAll('.isotope-filters li').forEach(function(btn) {
      btn.addEventListener('click', function() {
        var filterValue = this.getAttribute('data-filter');
        iso.arrange({ filter: filterValue });

        // update active class
        document.querySelectorAll('.isotope-filters .filter-active').forEach(function(el){
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');
      });
    });
  });
</script>
@endpush
