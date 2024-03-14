@extends('admin.layouts.master')

@section('title', 'Reservation Time')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn ">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 mt-3 text-center">Create A Reservation-Time</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('reservationTime#create') }}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <input id="cc-pament" name="reservationTime" type="text"
                                            value="{{ old('reservationTime') }}"
                                            class="form-control @error('reservationTime') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Reservation Time..." autofocus>
                                        @error('reservationTime')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-md btn-primary btn-block">
                                            <span id="payment-button-amount">Create</span>
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
