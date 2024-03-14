@extends('user.layouts.main')

@section('title', 'News Of GoldenEight')

@section('content')
    <!-- Start All Pages -->
    <div class="mb-5 all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Don't Miss Out Any News From Us!</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <!-- News Start -->
    <div class="blog " style="margin-bottom: 100px">
        <div class="container">
            <div class="mb-4 row">
                <div class="col-lg-12">
                    <div class="text-center heading-title">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row" id="items_container">
                @foreach ($news as $n)
                    <div class="p-2 col-lg-4 col-md-6">

                        <div class="blog-item">
                            <div class="blog-img">
                                @if ($n->image !== 'null')
                                    <img src="{{ asset('storage/' . $n->image) }}" alt="{{ $n->title }}">
                                @else
                                    <img src="{{ asset('admin/images/no-image.png') }}" alt="No image">
                                @endif
                            </div>
                            <div class="blog-content">
                                <h2 class="blog-title">{{ $n->title }}</h2>
                                <div class="blog-meta">
                                    <p><i class="far fa-calendar-alt"></i>{{ $n->created_at }}</p>
                                </div>
                                <div class="blog-text">
                                    <p class="text-justify text-wrap">{{ Str::limit($n->content, 80) }}</p>
                                    <a href="{{ route('user#newsDetail', $n->id) }}"
                                        class="mt-3 btn btn-lg btn-circle btn-common btn-outline-new-white">read more </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12 pagination justify-content-center">
                    {{ $news->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!-- News End -->
@endsection
