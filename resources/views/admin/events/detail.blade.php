@extends('admin.layouts.master')

@section('title', 'Event Info')

@section('content')
    <div class="content-wrapper">
        <div class="">
            <div class="container-fluid">
                <div class="col-lg-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="ms-5 btn">
                                <i class="fa-solid fa-arrow-left-long fs-4" onclick="history.back()"></i>
                            </div>
                            <div class="card-title">
                                <h2 class="text-center title-2 mt-3">Event Info</h2>
                            </div>
                            <hr>
                            <div class="row p-2">
                                <div class="col-md-3 offset-md-1 col-lg-3 offset-lg-1 mt-5 mb-5">
                                    @if ($event->image !== 'null')
                                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}"
                                            class="img-thumbnail shadow-sm">
                                    @else
                                        <img src="{{ asset('admin/images/no-image.png') }}" alt="no image"
                                            class="img-thumbnail shadow-sm">
                                    @endif
                                </div>
                                <span class="offset-md-1 col-md-7">
                                    <h3 class="mb-5 text-center mt-5">{{ $event->title }}</h3>
                                    <div class=" flex mb-5 text-center">
                                        <span class="mb-5 btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-calendar-days me-2"></i>{{ $event->event_date }}</span>
                                        <span class="mb-5 btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-clock me-2"></i>{{ $event->event_time }}</span>
                                        <p class="mb-5 btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-calendar-week me-2"></i>{{ $event->created_at->format('d/F/Y') }}
                                        </p>
                                    </div>
                                    <p class="mb-3 fs-6 text-center">{{ $event->description }}</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
