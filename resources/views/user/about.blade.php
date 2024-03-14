@extends('user.layouts.main')

@section('title', 'About GoldenEight Restaurant')

@section('content')
    <!-- Start All Pages -->
    <div class="mb-5 all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Check Out Our Story!</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <!-- Start About -->
    <div class="about-section-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="{{ asset('storage/' . $about->image) }}" alt="" class="img-fluid">
                </div>
                <div class="text-center col-lg-6 col-md-6 col-sm-12 ">
                    <div class="inner-column">
                        <h1 class="">Welcome To <span>{{ $about->title }}</span> Restaurant</h1>
                        <h4 class="">{{ $about->slug }}</h4>
                        <p class="">{{ $about->paragraph1 }} </p>
                        <p class="">{{ $about->paragraph2 }}</p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white"
                            href="{{ route('user#reservationPage') }}">Reservation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start Gallery -->
    <div class="mt-5 gallery-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center heading-title">
                        <h2>Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="tz-gallery">
                <div class="row">
                    @foreach ($galleries as $g)
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <a class="lightbox" href="{{ asset('storage/' . $g->image) }}">
                                <img class="img-fluid" src="{{ asset('storage/' . $g->image) }}" alt="{{ $g->title }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Gallery -->

    <!-- Start team -->
    <div class="mb-5 stuff-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center heading-title">
                        <h2>Our Hardworking Staff</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($team as $t)
                    <div class=" col-md-4 col-sm-6">
                        <div class="our-team ">
                            <img src="{{ asset('Storage/' . $t->image) }}">
                            <div class="team-content">
                                <h3 class="title">{{ $t->first_name }}</h3>
                                <h3 class="title">{{ $t->last_name }}</h3>
                                <span class="post">{{ $t->position }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End team -->
@endsection
