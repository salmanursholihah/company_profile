@extends('layouts.app_landing')

<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Portfolio</h1>
            solusi terpercaya pengelolaan limbah cair yang ramah lingkungan

            <nav class="breadcrumbs">
                <ol>
                    <li class="current">Home</li>
                    <li class="current">Portfolio</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">
        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <!-- Portfolio Filters -->
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">

                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">Our Customers</li>
                    <li data-filter=".filter-product">Product</li>
                    <li data-filter=".filter-branding">Technical</li>
                </ul>

                <!-- Portfolio Items -->
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    @foreach ($portfolios as $item)
                        <div
                            class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ strtolower($item->category) }}">
                            <div class="portfolio-content h-100">

                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid"
                                    alt="{{ $item->name }}">


                                <div class="portfolio-info">

                                    <h4>{{ $item->name }}</h4>
                                    <p>{{ $item->description ?? '' }}</p>

                                    <a href="{{ asset('storage/portfolio/' . $item->image) }}"
                                        title="{{ $item->name }}"
                                        data-gallery="portfolio-gallery-{{ strtolower($item->category) }}"
                                        class="glightbox preview-link">
                                        <i class="bi bi-zoom-in"></i>
                                    </a>

                                    <a href="#" class="details-link" title="More Details">
                                        <i class="bi bi-link-45deg"></i>
                                    </a>

                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- End Portfolio Items -->

            </div>

        </div>
    </section>
    <!-- /Portfolio Section -->

</main>
