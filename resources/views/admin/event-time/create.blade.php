@extends('admin.layouts.master')

@section('title', 'Create Event Time')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 grid-margin stretch-card">
                <div class="p-3 card">
                    <div class="card-body">
                        <div class="btn ">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="mt-3 mb-5 text-center card-title">Create An Event Time</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('eventTime#create') }}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <input id="cc-pament" name="eventTime" type="text" value="{{ old('eventTime') }}"
                                            class="form-control @error('eventTime') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Event Time..." autofocus>
                                        @error('eventTime')
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
