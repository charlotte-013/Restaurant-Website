@extends('admin.layouts.master')

@section('title', 'Create Event Type')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn ">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 text-center mt-3">Create An Event Type</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('eventType#create') }}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <input id="cc-pament" name="eventTypeName" type="text"
                                            value="{{ old('eventTypeName') }}"
                                            class="form-control @error('eventTypeName') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Event Type Name..." autofocus>
                                        @error('eventTypeName')
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
