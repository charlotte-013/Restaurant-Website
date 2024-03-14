@extends('admin.layouts.master')

@section('title', 'Reservation Info')

@section('content')
    <div class="content-wrapper">
        <div class="">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="ms-5 btn mb-4">
                                <i class="fa-solid fa-arrow-left-long fs-4" onclick="history.back()"></i>
                            </div>
                            <div class="card-title">
                                <h2 class="text-center title-2">Reservation Info</h2>
                            </div>
                            <hr>
                            <div class="row p-2 mt-5">
                                <span class="col-10 offset-1">
                                    <h3 class="mb-3"><i class="fa-solid fa-user me-2"></i>{{ $reservation->first_name }}
                                        {{ $reservation->last_name }}</h3>
                                    <p class="mb-3 fs-6"><i class="fa-solid fa-at me-2"></i>{{ $reservation->email }}</p>
                                    <p class="mb-4 fs-6"><i class="fa-solid fa-phone me-2"></i>{{ $reservation->phone }}</p>
                                    <div class="flex mb-5">
                                        <span class=" btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-calendar-days me-2"></i>{{ $reservation->reservation_date }}</span>
                                        <span class=" btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-clock me-2"></i>{{ $reservation->reservation_time }}</span>
                                        <span class=" btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-person me-2"></i>{{ $reservation->guest_number }}</span>
                                        <span class=" btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-calendar-week me-2"></i>{{ $reservation->created_at->format('d-F-Y') }}
                                        </span>
                                    </div>

                                    @if (!empty($reservation->message))
                                        <p class="mb-3 fs-5  text-justify">{{ $reservation->message }}</p>
                                    @else
                                        <p class="fs-5 text-justify">There is no messsage.</p>
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
