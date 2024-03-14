@extends('admin.layouts.master')

@section('title', 'Edit Event Type')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn ">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 text-center mt-3">Edit A Event Type</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('eventType#update', $eventType->id) }}" method="post"
                                    novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="eventTypeId" class="form-control"
                                            value="{{ $eventType->id }}">
                                        <input id="eventType-name" name="eventTypeName" type="text"
                                            value="{{ old('eventTypeName', $eventType->name) }}"
                                            class="form-control @error('eventTypeName') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Event Type Name...">
                                        @error('eventTypeName')
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
