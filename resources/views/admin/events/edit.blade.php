@extends('admin.layouts.master')

@section('title', 'Edit Event')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn ">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 text-center mt-3">Edit An Event</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('events#update', $event->id) }}" method="post"
                                    novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="eventId" class="form-control"
                                            value="{{ $event->id }}">
                                        <label for="event-title" class="form-label mb-1">Title</label>
                                        <input id="event-title" name="eventTitle" type="text"
                                            value="{{ old('eventTitle', $event->title) }}"
                                            class="form-control @error('eventTitle') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Event Title...">
                                        @error('eventTitle')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="event-description" class="form-label mb-1">Description</label>
                                            <textarea name="eventDescription" id="event-description" cols="30" rows="10"
                                                class="form-control @error('eventDescription') is-invalid @enderror" aria-required="true" aria-invalid="false"
                                                placeholder="Event Description...">{{ old('eventDescription', $event->description) }}</textarea>
                                            @error('eventDescription')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="event-date" class="control-label mb-1">Event Date</label>
                                            <input id="event-date" name="eventDate" type="date"
                                                value="{{ old('eventDate', $event->event_date) }}"
                                                class="form-control @error('eventDate') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Event  Date...">
                                            @error('eventDate')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="event-time" class="control-label mb-1">Event Time</label>
                                            <select name="eventTime"
                                                class="form-control @error('eventTime') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" id="event-time">
                                                <option value="null" disabled>Select an option</option>
                                                @foreach ($eventTimes as $eventTime)
                                                    <option
                                                        value="{{ $eventTime->id }} @if ($event->event_time == $eventTime->id) selected @endif">
                                                        {{ $eventTime->time }}</option>
                                                @endforeach
                                            </select>
                                            @error('eventTime')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="event-image" class="form-label mb-1">Image</label>
                                            <input id="event-image" name="eventImage" type="file"
                                                value="{{ old('eventImage', $event->image) }}"
                                                class="form-control @error('eventImage') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Event Image...">
                                            @error('eventImage')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-md btn-primary btn-block">
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
