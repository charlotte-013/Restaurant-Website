@extends('admin.layouts.master')

@section('title', 'Event Booking Info')

@section('content')
    <div class="content-wrapper">
        <div class="">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="ms-5 btn mb-3">
                                <i class="fa-solid fa-arrow-left-long fs-4" onclick="history.back()"></i>
                            </div>
                            <div class="card-title">
                                <h2 class="text-center title-2">Event Booking Info</h2>
                            </div>
                            <hr>
                            <div class="row">
                                <span class="col-12 text-center p-2">
                                    <h3 class="mb-4 mt-3"><i
                                            class="fa-solid fa-user me-2"></i>{{ $eventBooking->first_name }}
                                        {{ $eventBooking->last_name }}</h3>
                                    <h4 class="mb-4"><i class="fa-solid fa-at me-2"></i>{{ $eventBooking->email }}</h4>
                                    <h4 class="mb-4"><i class="fa-solid fa-phone me-2"></i>{{ $eventBooking->phone }}</h4>
                                    <div class="flex mb-2 text-center">
                                        <span class=" btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-calendar-days me-2"></i>{{ $eventBooking->event_booking_date }}</span>
                                        <span class=" btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-clock me-2"></i>{{ $eventBooking->event_time }}</span>
                                        <span class=" btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-person me-2"></i>{{ $eventBooking->guest_number }}</span>
                                    </div>
                                    <p class="mb-5 btn btn-sm bg-gradient-primary text-white"><i
                                            class="fa-solid fa-calendar me-2"></i>
                                        {{ $eventBooking->event_type }}</p>
                                    @if (!empty($reservation->message))
                                        <p class="mb-3 fs-5 text-center">{{ $eventBooking->message }}</p>
                                    @else
                                        <p class="text-center fs-5">There is no messsage.</p>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
