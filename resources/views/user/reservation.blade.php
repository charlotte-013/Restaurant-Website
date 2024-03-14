@extends('user.layouts.main')

@section('title', 'Make a Reservation at GoldenEight Restaurant')

@section('content')
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb mb-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Make A Reservation</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <!-- Start Reservation -->
    <div class="reservation-box mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="heading-title text-center">
                        <h2>Book Your Table For Private Dinners And Happy Hours</h2>
                    </div>
                </div>
            </div>

        @if (session('error'))
            <div class="col-6 offset-6">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="contact-block">
                        <form action="{{ route('user#reservation') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="firstName" class="fs-6 text-black">First Name</label>
                                            <input type="text" id="firstName" name="firstName"
                                                class="form-control @error('firstName') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('firstName') }}">
                                            @error('firstName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lastName" class="fs-6 text-black">Last Name</label>
                                            <input type="text" id="lastName" name="lastName"
                                                class="form-control @error('lastName') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('lastName') }}">
                                            @error('lastName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="fs-6 text-black">Email</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone" class="fs-6 text-black">Phone Number</label>
                                            <input type="text" id="phone" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('phone') }}">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="reservationDate" class="fs-6 text-black">Reservation Date</label>
                                            <input type="date" id="reservationDate" name="reservationDate"
                                                class="form-control @error('reservationDate') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('reservationDate') }}">
                                            @error('reservationDate')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="reservationTime" class="fs-6 text-black">Reservation Time</label>
                                            <select name="reservationTime" id="reservationTime"
                                                class="form-control @error('reservationTime') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('reservationTime') }}">
                                                <option value="null">Please Select</option>
                                                @foreach ($reservationTimes as $reservationTime)
                                                    <option value="{{ $reservationTime->id }}">{{ $reservationTime->time }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('reservationTime')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guestNumber" class="fs-6 text-black">Number of Guests</label>
                                            <input type="number" id="guestNumber" name="guestNumber"
                                                class="form-control @error('guestNumber') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('guestNumber') }}">
                                            @error('guestNumber')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message" class="fs-6 text-black">Message</label>
                                            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" cols="10" rows="3">{{ old('message') }}</textarea>
                                            @error('message')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn btn-common btn-circle btn-outline-new-white"
                                            type="submit">Book
                                            A Table</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Reservation -->
@endsection
