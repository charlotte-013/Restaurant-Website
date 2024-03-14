@extends('admin.layouts.master')

@section('title', 'Event List')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class=" col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3 mb-5 text-center card-title">Event List</h1>
                        <div class="mb-3 d-flex">
                            <div class="col-6">
                                <a href="{{ route('events#createPage') }}">
                                    <button class="btn btn-outline-primary">
                                        <i class="fa-solid fa-plus me-2"></i> Add Event
                                    </button>
                                </a>
                            </div>

                            <div class="col-4 offset-2 btn-sm">
                                <form action="{{ route('events#page') }}" method="GET">
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
                        @if (count($events) != 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Event Date</th>
                                            <th>Event Time</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $event)
                                            <tr class="text-center tr-shadow">
                                                <td class="col-1">{{ $event->id }}</td>
                                                <td><img src="{{ asset('storage/' . $event->image) }}" class="shadow-sm "
                                                        alt="{{ $event->title }}"></td>
                                                <td class="col-2">{{ Str::limit($event->title, 10) }}</td>
                                                <td class="">{{ $event->event_date }}</td>
                                                <td class="">{{ $event->event_time }}</td>
                                                <td class="col-3">
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('events#editPage', $event->id) }}">
                                                            <button class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="fa-solid fa-pen-to-square text-primary fs-5"></i>
                                                            </button></a>
                                                        <a href="{{ route('events#detailPage', $event->id) }}">
                                                            <button class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top" title="View">
                                                                <i class="fa-solid fa-eye text-info fs-5"></i>
                                                            </button></a>
                                                        <a href="{{ route('events#delete', $event->id) }}">
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
                            <h3 class="mt-5 text-center fs-5">No event. Create a new one!</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                {{ $events->links() }}
            </div>
        </div>
    </div>
@endsection
