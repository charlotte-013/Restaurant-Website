@extends('admin.layouts.master')

@section('title', 'Create Team Section')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="p-3 card">
                    <div class="card-body">
                        <div class="btn">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="mt-3 mb-5 text-center card-title">Create Team Section</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('team#create') }}" method="POST" novalidate="novalidate"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="team-firstName" class="mb-1 control-label">First Name</label>
                                        <input id="team-firstName" name="firstName" type="text"
                                            value="{{ old('firstName') }}"
                                            class="form-control @error('firstName') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="First Name..." autofocus>
                                        @error('firstName')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="team-lastName" class="mb-1 control-label">Last Name</label>
                                        <input id="team-lastName" name="lastName" type="text" value="{{ old('lastName') }}"
                                            class="form-control @error('lastName') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Last Name...">
                                        @error('lastName')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="team-position" class="mb-1 control-label">Position</label>
                                        <input id="team-position" name="position" type="text" value="{{ old('position') }}"
                                            class="form-control @error('position') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Position...">
                                        @error('position')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="team-image" class="mb-1 control-label">Image</label>
                                        <input id="team-image" name="image" type="file" value="{{ old('image') }}"
                                            class="form-control @error('image') is-invalid @enderror" aria-required="true"
                                            aria-invalid="false" placeholder="Image...">
                                        @error('image')
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
