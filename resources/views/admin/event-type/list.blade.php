@extends('admin.layouts.master')

@section('title', 'Event Type List')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3 mb-5 text-center card-title">Event Type List</h1>
                        <div class="mb-3 d-flex">
                            <div class="col-6">
                                <a href="{{ route('eventType#createPage') }}">
                                    <button class="btn btn-md btn-outline-primary">
                                        <i class="fa-solid fa-plus me-2"></i> Add Event Type
                                    </button>
                                </a>
                            </div>

                            <div class="col-4 offset-2 btn-sm">
                                <form action="{{ route('eventType#page') }}" method="GET">
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
                        @if (count($eventTypes) != 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($eventTypes as $eventType)
                                            <tr class="text-center tr-shadow">
                                                <td>{{ $eventType->id }}</td>
                                                <td class="col-4">{{ $eventType->name }}</td>
                                                <td>{{ $eventType->created_at->format('d-F-Y') }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('eventType#editPage', $eventType->id) }}">
                                                            <button class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="fa-solid fa-pen-to-square text-primary fs-5"></i>
                                                            </button></a>
                                                        <a href="{{ route('eventType#delete', $eventType->id) }}">
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
                            <h3 class="mt-5 text-center text-black fs-5">No event type. Create a new one!</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                {{ $eventTypes->links() }}
            </div>
        </div>
    </div>
@endsection
