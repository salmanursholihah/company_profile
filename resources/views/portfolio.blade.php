   @extends('layouts.app_landing')


   <main class="main">

       <!-- Page Title -->
       <div class="page-title dark-background">
           <div class="container position-relative">
               <h1>Portfolio</h1>
               <p>solusi terpercaya pengelolaan limbah cair yang ramah lingkungan</p>
               <nav class="breadcrumbs">
                   <ol>
                       <li class="current">Home</li>
                       <li class="current">About</li>
                   </ol>
               </nav>
           </div>
       </div><!-- End Page Title -->

       <!-- Portfolio Section -->
       <section id="portfolio" class="portfolio section">

           <div class="container">

               <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                   <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                       <li data-filter="*" class="filter-active">All</li>
                       <li data-filter=".filter-app">team</li>
                       <li data-filter=".filter-product">Product</li>
                       <li data-filter=".filter-branding">teknis</li>
                       {{-- <li data-filter=".filter-books">Books</li> --}}
                   </ul><!-- End Portfolio Filters -->

                   <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-naja.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-naja.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-dwi.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-dwi.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-diesta.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-diesta.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-salma.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-salma.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-nizar.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-nizar.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-rudi.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-rudi.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-nasrudin.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-nasrudin.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-dicky.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-dicky.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team-abi.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team-abi.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team1.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team1.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team2.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team2.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/team3.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>team</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/team3.jpeg" title="team"
                                       data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product1.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>Product 1</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product1.jpeg" title="Product 1"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/teknis-1.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>teknis 1</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/teknis-1.jpeg" title="Branding 1"
                                       data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->


                    

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product2.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>Product 2</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product2.jpeg" title="Product 2"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->

                       


                      

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/product3.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>Product 3</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/product3.jpeg" title="Product 3"
                                       data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->

                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/teknis-2.jpg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>teknis 3</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/teknis-2.jpg" title="Branding 2"
                                       data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->
                       <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                           <div class="portfolio-content h-100">
                               <img src="assets/img/portfolio/teknis-3.jpeg" class="img-fluid" alt="">
                               <div class="portfolio-info">
                                   <h4>teknis 3</h4>
                                   <p></p>
                                   <a href="assets/img/portfolio/teknis-3.jpeg" title="Branding 2"
                                       data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                           class="bi bi-zoom-in"></i></a>
                                   <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                           class="bi bi-link-45deg"></i></a>
                               </div>
                           </div>
                       </div><!-- End Portfolio Item -->

          

                   </div><!-- End Portfolio Container -->

               </div>

           </div>

       </section><!-- /Portfolio Section -->

   </main>