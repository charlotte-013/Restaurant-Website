@extends('user.layouts.main')

@section('title', 'Contact GoldenEight for Bookings & General Enquries')

@section('content')
    <!-- Start All Pages -->
    <div class="mb-5 all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Say Hello!</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->
    <!-- Start Contact Us Form -->
    <div class="mb-5 contact-box">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="mb-5 col-lg-6">
                        <h2 class="text-center heading-title">Get In Touch</h2>
                        <form action="{{ route('user#contact') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="firstName" name="contactFirstName"
                                            placeholder="First Name"
                                            class="form-control @error('contactFirstName') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" value="{{ old('contactFirstName') }}">
                                        @error('contactFirstName')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="lastName" name="contactLastName" placeholder="Last Name"
                                            class="form-control @error('contactLastName') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" value="{{ old('contactLastName') }}">
                                        @error('contactLastName')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" id="email" name="contactEmail"
                                            class="form-control @error('contactEmail') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" value="{{ old('contactEmail') }}">
                                        @error('contactEmail')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Phone" id="phone" name="contactPhone"
                                            class="form-control @error('contactPhone') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" value="{{ old('contactPhone') }}">
                                        @error('contactPhone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea id="message" placeholder="Message" name="contactMessage" rows="4"
                                            class="form-control @error('contactMessage') is-invalid @enderror" aria-required="true" aria-invalid="false">{{ old('contactMessage') }}</textarea>
                                        @error('contactMessage')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="text-center submit-button">
                                        <button class="btn btn-common" id="submit" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6 ">
                        <div class="contact">
                            <h2 class="text-center heading-title">Contact Information</h2>
                            <p class="fs-5 ms-5"><i class="fa-solid fa-location-dot me-1"></i> 4321 California St, San
                                Francisco,
                                CA
                                12345</p>
                            <p class=" fs-5 ms-5"><i class="fa-solid fa-phone me-1"></i> <a href="#" class="contact-phone">+01 2000 800
                                    9999</a></p>
                            <p class="fs-5 ms-5"><i class="fa-regular fa-envelope me-1"></i> <a href="mailto: golden_eight@gmail.com" class="contact-phone">
                                    golden_eight@gmail.com</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Us Form -->
@endsection
