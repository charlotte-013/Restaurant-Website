@extends('admin.layouts.master')

@section('title', 'Create Event')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="btn ">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 mt-3 text-center">Create An Event</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('events#create') }}" method="post" novalidate="novalidate"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Title</label>
                                        <input id="cc-pament" name="eventTitle" type="text"
                                            value="{{ old('eventTitle') }}"
                                            class="form-control @error('eventTitle') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Event Title..." autofocus>
                                        @error('eventTitle')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Description</label>
                                        <textarea name="eventDescription" id="cc-payment" cols="30" rows="10"
                                            class="form-control @error('eventDescription') is-invalid @enderror" aria-required="true" aria-invalid="false"
                                            placeholder="Event Description...">{{ old('eventDescription') }}</textarea>
                                        @error('eventDescription')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>

                                        <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Event Date</label>
                                        <input id="cc-pament" name="eventDate" type="date" value="{{ old('eventDate') }}"
                                            class="form-control @error('eventDate') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Event  Date...">
                                        @error('eventDate')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>

                                        <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Event Time</label>
                                        <select name="eventTime"
                                            class="form-control @error('eventTime') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" id="cc-payment">
                                            <option value="null">Select an option</option>
                                            @foreach ($eventTimes as $eventTime)
                                                <option value="{{ $eventTime->id }}">{{ $eventTime->time }}</option>
                                            @endforeach
                                        </select>
                                        @error('eventTime')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>

                                        <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Image</label>
                                        <input id="cc-pament" name="eventImage" type="file"
                                            value="{{ old('eventImage') }}"
                                            class="form-control @error('eventImage') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Event Image...">
                                        @error('eventImage')
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
