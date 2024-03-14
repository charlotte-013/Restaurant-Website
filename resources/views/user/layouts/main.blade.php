<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js
"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('user/images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('user/images/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('favicon1.ico') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"
        integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/custom.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    {{-- loader --}}
    <div id="preloader">
        <div class="preloader"></div>
    </div>

    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light " id="navbar-header">
            <div class="container">
                <a class="navbar-brand" href="{{ route('user#home') }}">
                    <h1 class="golden-eight"><span class="">Golden</span>Eight</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="ml-auto navbar-nav">
                        <li class="nav-item {{ request()->routeIs('user#home') ? 'active' : 'none' }}"><a
                                class="nav-link" href="{{ route('user#home') }}">Home</a></li>
                        <li class="nav-item {{ request()->routeIs('user#about') ? 'active' : 'none' }}"><a
                                class="nav-link" href="{{ route('user#about') }}">About</a></li>
                        <li
                            class="nav-item {{ request()->routeIs('user#menu') || request()->routeIs('user#filter') ? 'active' : 'none' }}">
                            <a class="nav-link" href="{{ route('user#menu') }}">Menu</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('user#events') ? 'active' : 'none' }}"><a
                                class="nav-link" href="{{ route('user#events') }}">Event</a></li>
                        <li class="nav-item {{ request()->routeIs('user#news') ? 'active' : 'none' }}"><a
                                class="nav-link" href="{{ route('user#news') }}">News</a></li>
                        <li class="nav-item {{ request()->routeIs('user#contactPage') ? 'active' : 'none' }}"><a
                                class="nav-link" href="{{ route('user#contactPage') }}">Contact</a></li>
                        <li class="nav-item {{ request()->routeIs('user#reservationPage') ? 'active' : 'none' }}"><a
                                class="nav-link nav-btn" href="{{ route('user#reservationPage') }}">Reservation</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->
    </div>

    @yield('content')

    <!-- Start Newsletter Form -->
    <div class="container mb-5 subscribe_form">
        <div class="text-center heading-title">
            <h3 class="">Keep Up To Date With GoldenEight</h3>
            <p>Subscribe to receive special news and event updates from GoldenEight.</p>
        </div>
        <form class="subscribe_form" method="POST" action="{{ route('user#newsletter') }}">
            @csrf
            <input type="email" name="email" id="subs-email"
                class="form_input offset-2 col-6 @error('contactFirstName') is-invalid @enderror "
                placeholder="Email Address..." aria-required="true" aria-invalid="false" style="color: black">
            <button type="submit" class="ml-3 btn btn-common text-uppercase">Subscribe</button>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </form>
    </div>
    <!-- End Newsletter Form -->

    <!-- Start Footer -->
    <footer class="footer-area bg-f">
        <div class="container">
            <div class="row justify-content-around">
                <div class="mb-5 col-lg-3 col-md-6">
                    <h3>Opening hours</h3>
                    <p><span class="text-color text-uppercase">Lunch</span></p>
                    <p><span class="text-color">Daily :</span> {{ $footer->opening_time1 }} AM - {{ $footer->closing_time1 }} PM</p>
                    <p><span class="text-color text-uppercase">Dinner</span></p>
                    <p><span class="text-color">Daily :</span> {{ $footer->opening_time2 }} PM - {{ $footer->closing_time2 }} PM</p>

                </div>
                <div class="mb-5 col-lg-3 col-md-6">
                    <h3>Contact information</h3>
                    <p class="lead"><i class="fa-solid fa-location-dot me-1"></i> {{ $footer->address }}</p>
                    <p class="lead"><i class="fa-solid fa-phone me-1"></i> <a href="#">{{ $footer->phone }}</a></p>
                    <p><i class="fa-regular fa-envelope me-1"></i> <a href="mailto: {{ $footer->email }}"> {{ $footer->email }}</a></p>
                </div>
                <div class="mb-5 col-lg-3 col-md-6">
                    <h3 class="mt-3 social">Follow Us</h3>
                    <ul class="mb-3 list-inline f-social">
                        <li class="list-inline-item"><a href="{{ $footer->facebook_url }}"><i
                                    class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="{{ $footer->twitter_url }}"><i
                                    class="fa-brands fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $footer->linkedin_url }}"><i
                                    class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="{{ $footer->instagram_url }}"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </li>
                    </ul>

                    <p><a class="btn main-btn" href="{{ route('user#reservationPage') }}">Reservation</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <div class="extra-footer">
        &copy; Copyright 2024. All Rights Reserved.
    </div>
    <!-- End Footer -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"
        integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ALL JS FILES -->
    <script src="{{ asset('user/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('user/js/popper.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('user/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('user/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('user/js/isotope.min.js') }}"></script>
    <script src="{{ asset('user/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('user/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('user/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('user/js/custom.js') }}"></script>
    <script src="{{ asset('user/js/scroll-animation.js') }}"></script>
    <script src="{{ asset('user/js/datetimepicker.js') }}"></script>
    @yield('scriptSource')
</body>

</html>
