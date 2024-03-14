@extends('user.layouts.main')

@section('title', 'News Detail')

@section('content')
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>News Detail</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    {{-- Start news detail --}}
    <div class="blog-box mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-xl-12 col-lg-12 col-12">
                    <div class="blog-inner-details-page offset-1 col-10">
                        <div class="blog-inner-box">
                            <div class="side-blog-img mb-3">
                                @if ($news->image === 'null')
                                    <img class="img-fluid" src="{{ asset('admin/images/no-image.png') }}" alt="No image">
                                @else
                                    <img class="img-fluid" src="{{ asset('storage/' . $news->image) }}"
                                        alt="{{ $news->title }}">
                                @endif

                                <div class="date-blog-up">
                                    {{ $news->created_at->format('d M') }}
                                </div>
                            </div>
                            <div class="inner-blog-detail details-page text-center">
                                <h2 class="fs-3 mb-3">{{ $news->title }}</h2>
                                <h5 class="fs-4 mb-3">{{ $news->sub_title }}</h5>
                                <ul>
                                    <li class="fs-5 mb-3"><i class="zmdi zmdi-time"></i>Time :
                                        <span>{{ $news->created_at->format('h:i A') }}</span>
                                    </li>
                                </ul>
                                <p class="text-black">{{ $news->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <a href="{{ route('user#news') }}">
                            <button id="load_more_button"
                                class="mt-3 btn btn-lg btn-circle btn-common btn-outline-new-white">Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end news detail --}}
@endsection
