@extends('user.layouts.main')

@section('title', 'GoldenEight Restaurant')

@section('content')
    <!-- Start slides -->
    <div id="slides" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="{{ asset('user/images/slider-01.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20 top-hidden"><strong>Welcome To <br> <span
                                        style="color: #d0a772">Golden</span>Eight
                                    Restaurant</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br>
                                trends to see any changes in performance over time.</p>
                            <p><a class="btn main-btn" href="{{ route('user#reservationPage') }}">Reservation</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('user/images/slider-02.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> <span style="color: #d0a772">Golden</span>Eight
                                    Restaurant</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br>
                                trends to see any changes in performance over time.</p>
                            <p><a class="btn main-btn" href="{{ route('user#reservationPage') }}">Reservation</a>
                            </p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End slides -->

    <!-- Start About -->
    <div class="about-section-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="{{ asset('storage/'.$about->image) }}" alt="{{ $about->title }}" class="img-fluid">
                </div>
                <div class="text-center col-lg-6 col-md-6 col-sm-12 ">
                    <div class="inner-column">
                        <h1 class="hidden">Welcome To <span>{{ $about->title }} </span>Restaurant</h1>
                        <h4 class="hidden">{{ $about->slug }}</h4>
                        <p class="hidden">{{ $about->paragraph1 }} </p>
                        <p class="hidden">{{ $about->paragraph2 }}</p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="{{ route('user#reservationPage') }}">Reservation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start QT -->
    <div class="qt-box qt-background">
        <div class="container">
            <div class="row">
                <div class="ml-auto mr-auto text-left col-md-8">
                    <p class="lead top-hidden">
                        " {{ $quote->quote }} "
                    </p>
                    <span class="lead fs-3">- {{ $quote->name }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End QT -->

    <!-- Special Dishes Section -->
    <section id="gtco-special-dishes" class="mt-5 mb-5 bg-grey section-padding">
        <div class="container">
            <div class="section-content">
                <div class="text-center heading-section">
                    <h2>
                        Today's Special
                    </h2>
                </div>
                <div class="mt-5 row">
                    <div class="py-5 col-lg-5 col-md-6 align-self-center">
                        <h2 class="special-number">01.</h2>
                        <div class="dishes-text ">
                            <h3 class="right-hidden"><span>{{ $menu1->name }}</span></h3>
                            <p class="pt-3 right-hidden">{{ $menu1->description }}</p>
                            <h3 class="special-dishes-price right-hidden">{{ $menu1->price }} kyats</h3>
                            <a href="{{ route('user#menu') }}" class="mt-3 btn btn-lg btn-circle btn-outline-new-white">view
                                menu <span><i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                    <div class="mt-4 col-lg-5 offset-lg-2 col-md-6 align-self-center mt-md-0">
                        <img src="{{ asset('storage/'.$menu1->image) }}" alt="{{ $menu1->name }}"
                            class="shadow img-fluid w-100">
                    </div>
                </div>
                <div class="mt-5 row">
                    <div class="order-2 mt-4 col-lg-5 col-md-6 align-self-center order-md-1 mt-md-0">
                        <img src="{{ asset('storage/'.$menu2->image) }}" alt="{{ $menu2->name }}"
                            class="shadow img-fluid w-100">
                    </div>
                    <div class="order-1 py-5 col-lg-5 offset-lg-2 col-md-6 align-self-center order-md-2">
                        <h2 class="special-number">02.</h2>
                        <div class="dishes-text">
                            <h3 class="hidden"><span>{{ $menu2->name }}</span></h3>
                            <p class="hidden pt-3">{{ $menu2->description }}</p>
                            <h3 class="hidden special-dishes-price">{{ $menu2->price }} kyats</h3>
                            <a href="{{ route('user#menu') }}"
                                class="mt-3 btn btn-lg btn-circle btn-outline-new-white">view menu <span><i
                                        class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Special Dishes Section -->

    {{-- Start events Section --}}
    <div class="mt-5 mb-5 news-box">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center heading-title">
                        <h2>Events</h2>
                    </div>
                </div>
            </div>
            <div class="row special-list">
                @foreach ($event as $e)
                    <div class="hidden col-lg-4 col-md-6 special-grid">
                        <div class="gallery-single fix">
                            <img src="{{ asset('storage/' . $e->image) }}" class="img-fluid" alt="{{ $e->title }}">
                            <div class="why-text">
                                <h4>{{ $e->title }}</h4>
                                <p>{{ Str::limit($e->description, 20) }}</p>
                                <span class="fs-5"> {{ $e->event_date }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-5 row">
                <div class="col-md-12">
                    <div class="text-center">
                        <a href="{{ route('user#events') }}">
                            <button id="load_more_button"
                                class="mt-3 btn btn-lg btn-circle btn-common btn-outline-new-white">View More <span><i
                                        class="fa fa-long-arrow-right"></i></span></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End events Section --}}

    {{-- start news section --}}
    <div id="blog" class="blog-main pad-top-100 pad-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="text-center heading-section">
                        <h2>
                            News
                        </h2>
                    </div>
                    <div class="mb-5 event-box row">
                        @foreach ($news as $n)
                            <div class="hidden col-md-6 col-sm-6 col-lg-6">
                                <div class="hidden blog-block">
                                    <div class="blog-img-box">
                                        <img src="{{ asset('storage/' . $n->image) }}" alt="{{ $n->title }}" />
                                        <div class="overlay">
                                            <a href="{{ route('user#eventDetail', $n->id) }}"><i class="fa fa-link"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="blog-dit">
                                        <p><span class="fs-6">{{ $n->created_at->format('d F, Y') }}</span></p>
                                        <h2>{{ $n->title }}</h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- end blog-box -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <a href="{{ route('user#news') }}">
                                    <button id="load_more_button"
                                        class="mt-3 btn btn-lg btn-circle btn-common btn-outline-new-white">View More
                                        <span><i class="fa fa-long-arrow-right"></i></span></button>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    {{-- end news section --}}


@endsection
