@extends('admin.layouts.master')

@section('title', 'Event Time List')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3 mb-5 text-center card-title">Event Time List</h1>
                        <div class="mb-3 d-flex">
                            <div class="col-6">
                                @if (count($eventTimes) >= 3)
                                    <a href="#">
                                        <button class="btn btn-outline-primary" disabled>
                                            <i class="fa-solid fa-plus me-2"></i> Add Event Time
                                        </button>
                                    </a>
                                @else
                                    <a href="{{ route('eventTime#createPage') }}">
                                        <button class="btn btn-outline-primary">
                                            <i class="fa-solid fa-plus me-2"></i> Add Event Time
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </div>
                        @if (count($eventTimes) != 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Time</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($eventTimes as $eventTime)
                                            <tr class="text-center tr-shadow">
                                                <td>{{ $eventTime->id }}</td>
                                                <td class="col-4">{{ $eventTime->time }}</td>
                                                <td>{{ $eventTime->created_at->format('d-F-Y') }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('eventTime#editPage', $eventTime->id) }}">
                                                            <button class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="fa-solid fa-pen-to-square text-primary fs-5"></i>
                                                            </button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h3 class="mt-5 text-center text-black fs-5">No event time. Create a new one!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
