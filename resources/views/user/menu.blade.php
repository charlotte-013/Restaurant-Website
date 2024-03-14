@extends('user.layouts.main')

@section('title', 'GoldenEight Menu')

@section('content')
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Taste All Of Our Menu!</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    {{--
<!-- Special Dishes Section -->
<section id="gtco-special-dishes" class="mt-5 bg-grey section-padding">
    <div class="container">
        <div class="section-content">
            <div class="text-center heading-section">
                <h2>Our Special Dishes</h2>
            </div>
            <div class="mt-5 row">
                <div class="py-5 col-lg-5 col-md-6 align-self-center">
                    <h2 class="special-number">01.</h2>
                    <div class="dishes-text">
                        <h3><span>Beef</span><br> Steak Sauce</h3>
                        <p class="pt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, ea vero
                            alias perferendis quas animi doloribus voluptates. Atque explicabo ea nesciunt provident
                            libero qui eum, corporis esse quos excepturi soluta?</p>
                        <h3 class="special-dishes-price">$15.00</h3>
                        <a href="#" class="mt-3 text-black btn btn-lg btn-circle btn-outline-new-white">view menu
                            <span><i class="fa fa-long-arrow-right"></i></span></a>
                    </div>
                </div>
                <div class="mt-4 col-lg-5 offset-lg-2 col-md-6 align-self-center mt-md-0">
                    <img src="{{ asset('user/images/steak.jpg') }}" alt="" class="shadow img-fluid w-100">
                </div>
            </div>
            <div class="mt-5 row">
                <div class="order-2 mt-4 col-lg-5 col-md-6 align-self-center order-md-1 mt-md-0">
                    <img src="{{ asset('user/images/salmon-zucchini.jpg') }}" alt="" class="shadow img-fluid w-100">
                </div>
                <div class="order-1 py-5 col-lg-5 offset-lg-2 col-md-6 align-self-center order-md-2">
                    <h2 class="special-number">02.</h2>
                    <div class="dishes-text">
                        <h3><span>Salmon</span><br> Zucchini</h3>
                        <p class="pt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, accusamus
                            culpa quam amet ipsam odit ea doloremque accusantium quo, itaque possimus eius. In a quis
                            quibusdam omnis atque vero dolores!</p>
                        <h3 class="special-dishes-price">$12.00</h3>
                        <a href="#" class="mt-3 text-black btn btn-lg btn-circle btn-outline-new-white">view menu
                            <span><i class="fa fa-long-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Special Dishes Section --> --}}

    <!-- Start Menu -->
    <div class="menu-box">
        <div class="container">
            <div class="row  mt-4">
                <div class="col-lg-12 mb-3">
                    <div class="text-center special-menu">
                        <div class="button-group filter-button-group">
                            <a href="{{ route('user#menu') }}">
                                <button class="{{ request()->routeIs('user#menu') ? 'active' : 'none' }}">All</button>
                            </a>
                            @foreach ($category as $c)
                                <a href="{{ route('user#filter', $c->id) }}">
                                    <button
                                        class="@if (url()->current() === 'http://127.0.0.1:8000/goldeneight/menu/filter/' . $c->id) active @endif">{{ $c->name }}</button>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5" id="items_container">
                @forelse ($menu as $m)
                    <div class="col-lg-4 col-md-6 col-sm-4 fh5co-card-item">
                        <figure>
                            <div class="overlay"></div>
                            @if ($m->image === 'null')
                                <img src="{{ asset('admin/images/no-image.png') }}" alt="No image" class="img-responsive">
                            @else
                                <img src="{{ asset('storage/' . $m->image) }}" alt="{{ $m->name }}"
                                    class="img-responsive">
                            @endif

                        </figure>
                        <div class="fh5co-text">
                            <h2 class="fs-4">{{ $m->name }}</h2>
                            <p>{{ $m->description }}</p>
                            <p class=""><span class="price cursive-font">{{ $m->price }} kyats</span></p>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-black mt-5 mb-5">No menu available!</p>
                @endforelse
            </div>

            {{-- <div class="row mb-5">
                <div class="col-md-12 pagination justify-content-center">
                    {{ $menu->links('pagination::bootstrap-4') }}
                </div>
            </div> --}}

            <div class="row mt-5 mb-5">
                <div class="col-md-12">
                    <div class="text-center">
                        <button id="load_more_button" data-page="{{ $menu->currentPage() + 1 }}"
                            class="mt-3 btn btn-lg btn-circle btn-common btn-outline-new-white">Load More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Menu -->
@endsection

@section('scriptSource')
    <script>
        $(document).ready(function() {
            var start = 6;

            $('#load_more_button').click(function() {
                $.ajax({
                    url: "{{ route('user#loadMoreMenus') }}",
                    method: "GET",
                    data: {
                        start: start
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $('#load_more_button').html('Loading...');
                        $('#load_more_button').attr('disabled', true);
                    },
                    success: function(data) {

                        if (data.data.length > 0) {
                            var html = '';
                            for (var i = 0; i < data.data.length; i++) {
                                html += `<div class="col-lg-4 col-md-4 col-sm-6 fh5co-card-item">
                                        <figure>
                                            <div class="overlay"></div>
                                            <img src="` + data.data[i].image + `" alt="` + data.data[i].name + `" class="img-responsive">
                                        </figure>
                                        <div class="fh5co-text">
                                            <h2>` + data.data[i].name + `</h2>
                                            <p>` + data.data[i].description + `</p>
                                            <p><span class="price cursive-font">` + data.data[i].price + ` kyats</span></p>
                                        </div>
                                    </div>`;
                            }
                            //console.log(html);
                            //append data without fade in effect
                            //$('#items_container').append(html);

                            //append data with fade in effect
                            $('#items_container').append($(html).hide().fadeIn(1000));
                            $('#load_more_button').html('Load More');
                            $('#load_more_button').attr('disabled', false);
                            start = data.next;
                        } else {
                            $('#load_more_button').html('No More Data Available');
                            $('#load_more_button').attr('disabled', true);
                        }
                    }
                });
            });
        });
    </script>
@endsection
