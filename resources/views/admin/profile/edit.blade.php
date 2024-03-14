@extends('admin.layouts.master')

@section('title', 'Edit Profile')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="ms-5 btn">
                            <i class="fa-solid fa-arrow-left-long fs-4" onclick="history.back()"></i>
                        </div>
                        <div class="card-title">
                            <h3 class="text-center title-2">Edit Profile</h3>
                        </div>
                        <hr>

                        <form action="{{ route('admin#update', Auth::user()->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-4">
                                <div class="col-4 offset-1">
                                    @if (Auth::user()->avatar === 'null')
                                        <img src="{{ asset('images/default-avatar.webp') }}" alt="default_user"
                                            class="img-thumbnail shadow-sm mt-3">
                                    @else
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="user_profile"
                                            class="img-thumbnail shadow-sm mt-3">
                                    @endif

                                    <div class="mt-3">
                                        <input type="file" name="avatar"
                                            class="form-control @error('avatar') is-invalid @enderror">
                                        @error('avatar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-md btn-primary btn-block col-6 offset-3">
                                            Update
                                        </button>
                                    </div>
                                </div>

                                <div class="row col-6">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Name</label>
                                        <input id="cc-pament" name="name" type="text"
                                            value="{{ old('name', Auth::user()->name) }}"
                                            class="form-control @error('name') is-invalid @enderror" aria-required="true"
                                            aria-invalid="false" placeholder="Name...">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Email</label>
                                        <input id="cc-pament" name="email" type="text"
                                            value="{{ old('email', Auth::user()->email) }}"
                                            class="form-control @error('email') is-invalid @enderror" aria-required="true"
                                            aria-invalid="false" placeholder="Email...">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Role</label>
                                        <input id="cc-pament" name="role" type="text"
                                            value="{{ old('role', Auth::user()->role) }}" class="form-control"
                                            aria-required="true" aria-invalid="false" disabled>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
