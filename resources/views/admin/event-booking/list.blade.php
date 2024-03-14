@extends('admin.layouts.master')

@section('title', 'Event Booking List')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3 mb-5 text-center card-title">Event Booking List</h1>
                        <div class="mb-3 d-flex">
                            <div class="offset-8 col-4">
                                <form action="{{ route('eventBookings#page') }}" method="GET">
                                    @csrf
                                    <div class="d-flex">
                                        <input type="text" name="key" class="form-control" placeholder="Search..."
                                            value="{{ request('key') }}">
                                        <button type="submit" class="btn btn-sm btn-outline-primary ms-1">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if (count($eventBookings) != 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Person</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($eventBookings as $eventBooking)
                                            <tr class="text-center tr-shadow">
                                                <td>{{ $eventBooking->id }}</td>
                                                <td class="">{{ $eventBooking->first_name }}</td>
                                                <td class="">{{ $eventBooking->email }}</td>
                                                <td class="">{{ $eventBooking->event_type }}</td>
                                                <td class="">{{ $eventBooking->event_booking_date }}</td>
                                                <td class="">{{ $eventBooking->event_time }}</td>
                                                <td class="">{{ $eventBooking->guest_number }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a
                                                            href="{{ route('eventBookings#detailPage', $eventBooking->id) }}">
                                                            <button class="btn btn-sm" data-toggle="tooltip"
                                                                data-placement="top" title="View">
                                                                <i class="fa-solid fa-eye text-info fs-5"></i>
                                                            </button></a>
                                                        <a href="{{ route('eventBookings#delete', $eventBooking->id) }}">
                                                            <button class="btn btn-sm" data-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <i class="fa-solid fa-trash-can text-danger fs-5"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @else
                            <h3 class="mt-5 text-center fs-5">No one booked an event yet.</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                {{ $eventBookings->links() }}
            </div>
        </div>
    </div>
@endsection
