@extends('layouts.app_landing')

@php
    use Illuminate\Support\Str;
@endphp

<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Product Catalog</h1>
            Solusi terpercaya pengelolaan limbah cair yang ramah lingkungan
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
                    <li class="list-inline-item me-2 filter-active btn btn-outline-primary" data-filter="*">All
                        Companies</li>
                    @foreach ($companies ?? [] as $company)
                        <li class="list-inline-item me-2 btn btn-outline-primary"
                            data-filter=".{{ Str::slug($company) }}">
                            {{ $company }}
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Produk --}}
            <div class="row g-4 isotope-container" data-aos="fade-up">
                @forelse($products ?? [] as $product)
                    <div class="col-lg-4 col-md-6 isotope-item {{ Str::slug($product->company) }}">
                        <div class="card h-100 shadow border-0 katalog-card">

                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/img/no-image.png') }}"
                                class="card-img-top katalog-img" alt="{{ $product->name }}">

                            <div class="card-body d-flex flex-column">

                                <small class="text-muted">{{ $product->company }}</small>

                                <h5 class="fw-bold">{{ $product->name }}</h5>

                                <p class="text-muted small">
                                    {{ $product->preview_desc ?? Str::limit($product->deskripsi, 120) }}
                                </p>

                                <button class="btn btn-primary mt-auto" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $product->id }}">
                                    Detail Produk
                                </button>

                            </div>
                        </div>
                    </div>

                    {{-- ✅ MODAL DETAIL PRODUK --}}
                    <div class="modal fade" id="detailModal{{ $product->id }}" tabindex="-1">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content border-0 shadow">

                                <div class="modal-body p-0">

                                    <div class="row g-0">

                                        {{-- IMAGE --}}
                                        <div class="col-md-6">
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                class="w-100 h-100 object-fit-cover">
                                        </div>

                                        {{-- DETAIL --}}
                                        <div class="col-md-6 p-4">

                                            <h3 class="fw-bold mb-3">{{ $product->name }}</h3>

                                            <div class="mb-3">
                                                <span class="badge bg-primary">{{ $product->kategori }}</span>
                                                <span class="badge bg-dark">{{ $product->brand }}</span>
                                            </div>

                                            <p class="text-muted">
                                                {{ $product->deskripsi }}
                                            </p>

                                            <hr>

                                            {{-- INFO TEKNIS --}}
                                            <h6 class="fw-bold">Informasi Produk</h6>

                                            <table class="table table-sm">
                                                <tr>
                                                    <td>Kode Produk</td>
                                                    <td>{{ $product->kode_produk ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Brand</td>
                                                    <td>{{ $product->brand ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Model</td>
                                                    <td>{{ $product->model_produk ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Seri</td>
                                                    <td>{{ $product->seri_produk ?? '-' }}</td>
                                                </tr>
                                            </table>

                                            {{-- SPESIFIKASI --}}
                                            @if ($product->spesifikasi)
                                                <h6 class="fw-bold mt-3">Spesifikasi</h6>
                                                <p class="small text-muted">
                                                    {!! nl2br(e($product->spesifikasi)) !!}
                                                </p>
                                            @endif

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                @empty
                    <p class="text-center">Belum ada produk</p>
                @endforelse
            </div>


        </div>
    </section>

    <!-- Contact Info -->
    {{-- <section class="contact-info bg-light py-4">
    <div class="container text-center">
      <h5>Hubungi Kami</h5>
      <p>📞 +62 711 419005 | +62 859 3281 8611</p>
      <p>✉️ utamacta@gmail.com</p>
    </div>
  </section> --}}

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
                    iso.arrange({
                        filter: filterValue
                    });

                    // update active class
                    document.querySelectorAll('.isotope-filters .filter-active').forEach(function(
                        el) {
                        el.classList.remove('filter-active');
                    });
                    this.classList.add('filter-active');
                });
            });
        });
    </script>
@endpush
