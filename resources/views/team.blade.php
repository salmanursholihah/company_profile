@extends('layouts.app_landing')
@section('title', 'company profile')
@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>Team</h1>
            solusi terpercaya pengelolaan limbah cair yang ramah lingkungan
            <nav class="breadcrumbs">
                <ol>
                    <li class="current">Home</li>
                    <li class="current">Team</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Team Section -->
    <section id="team" class="team section">

        <div class="container">

            <div class="row gy-5">

                @foreach ($teams as $index => $team)
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                        <div class="member-img">
                            <img src="{{ asset('storage/' . $team->image) }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>{{ $team->name }}</h4>
                            <span>{{ $team->position }}</span>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach

            </div>

        </div>

    </section><!-- /Team Section -->

</main>
@endsection
