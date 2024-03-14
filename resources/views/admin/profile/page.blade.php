@extends('admin.layouts.master')

@section('title', 'Profile Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="ms-5 btn">
                            <i class="fa-solid fa-arrow-left-long fs-4" onclick="history.back()"></i>
                        </div>
                        <div class="mt-3 mb-5 card-title">
                            <h3 class="text-center title-2">Account Info</h3>
                        </div>
                        <div class="mb-3 d-flex">
                        </div>

                        <div class="row">
                            <div class="mt-3 col-3 offset-2">
                                @if (Auth::user()->avatar === 'null')
                                    <img src="{{ asset('images/default-avatar.webp') }}" alt="default_user"
                                        class="mt-3 shadow-sm">
                                @else
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="user_profile"
                                        class="mt-3 shadow-sm">
                                @endif
                            </div>

                            <div class="col-5 offset-1">
                                <h4 class="p-3 mb-3 border border-3"> <i class="fa-solid fa-user me-2"></i>
                                    {{ Auth::user()->name }}
                                </h4>
                                <h4 class="p-3 mb-3 border border-3"> <i class="fa-solid fa-at me-2"></i>
                                    {{ Auth::user()->email }}</h4>
                                <h4 class="p-3 mb-3 border border-3"> <i class="fa-solid fa-clock me-2"></i>
                                    {{ Auth::user()->created_at->format('d-F-Y') }}</h4>
                            </div>
                        </div>

                        <div class="mt-5 row">
                            <div class="mt-4 offset-1 col-5">
                                <a href="{{ route('admin#editPage') }}">
                                    <button id="payment-button" class="btn btn-md btn-primary btn-block">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit Profile
                                    </button>
                                </a>
                            </div>
                            <div class="mt-4 col-5 offset-1">
                                <a href="{{ route('admin#changePasswordPage') }}">
                                    <button id="payment-button" class="btn btn-md btn-primary btn-block">
                                        <i class="fa-solid fa-pen-to-square"></i> Change Password
                                    </button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
