@extends('user.layouts.main')

@section('title', 'Event Detail')

@section('content')
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Event Detail</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    {{-- Start news detail --}}
    <div class="blog-box mb-5">
        <div class="container">
            <div class="row mb-4 mt-5">
                <div class="col-xl-12 col-lg-12 col-12">
                    <div class="blog-inner-details-page offset-1 col-10">
                        <div class="blog-inner-box">
                            <div class="side-blog-img">
                                @if ($event->image === 'null')
                                    <img class="img-fluid" src="{{ asset('admin/images/no-image.png') }}" alt="No image">
                                @else
                                    <img class="img-fluid" src="{{ asset('storage/' . $event->image) }}"
                                        alt="{{ $event->title }}">
                                @endif
                                <div class="date-blog-up">
                                    {{ $event->created_at->format('d M') }}
                                </div>
                            </div>
                            <div class="inner-blog-detail details-page text-center mt-5">
                                <h2 class="fs-2 mb-3">{{ $event->title }}</h2>
                                <ul class="mb-4">
                                    <li class="fs-5"><i class="zmdi zmdi-time"></i>Event Date :
                                        <span>{{ $event->event_date }}</span>
                                    </li>
                                    <li class="fs-5"><i class="zmdi zmdi-time"></i>Event Time :
                                        @foreach ($eventTime as $e)
                                            @if ($e->id === $event->event_time_id)
                                                <span>{{ $e->time }}</span>
                                            @endif
                                        @endforeach
                                    </li>
                                </ul>
                                <p class="">{{ $event->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <a href="{{ route('user#events') }}">
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
