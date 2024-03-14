@extends('admin.layouts.master')

@section('title', 'Reservation Time')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn mb-3">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 mt-3 text-center">Edit A Reservation-Time</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('reservationTime#update', $reservationTime->id) }}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="reservationTimeId" class="form-control" value="{{ $reservationTime->id }}">
                                        <input id="reservation-time" name="reservationTime" type="text"
                                            value="{{ old('reservationTime', $reservationTime->time) }}"
                                            class="form-control @error('reservationTime') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Reservation Time...">
                                        @error('reservationTime')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-md btn-primary btn-block">
                                            <span id="payment-button-amount">Update</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
