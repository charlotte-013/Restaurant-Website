@extends('admin.layouts.master')

@section('title', 'Reservation List')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3 mb-5 text-center card-title">Reservation List</h1>
                        <div class="mb-3 d-flex">
                            <div class="offset-8 col-4">
                                <form action="{{ route('reservations#page') }}" method="GET">
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
                        @if (count($reservations) != 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Guest</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservations as $reservation)
                                            <tr class="text-center tr-shadow">
                                                <td class="col-1">{{ $reservation->id }}</td>
                                                <td class="">{{ $reservation->first_name }}</td>
                                                <td class="">{{ $reservation->email }}</td>
                                                <td class="">{{ $reservation->phone }}</td>
                                                <td class="">{{ $reservation->reservation_date }}</td>
                                                <td class="">{{ $reservation->reservation_time }}</td>
                                                <td class="col-1">{{ $reservation->guest_number }}</td>
                                                <td class="col-3">
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('reservations#detailPage', $reservation->id) }}">
                                                            <button class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top" title="View">
                                                                <i class="fa-solid fa-eye text-info fs-5"></i>
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('reservations#delete', $reservation->id) }}">
                                                            <button class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top" title="Delete">
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
                            <h3 class="mt-5 text-center fs-5">No reservations yet.</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                {{ $reservations->links() }}
            </div>
        </div>
    </div>
@endsection
