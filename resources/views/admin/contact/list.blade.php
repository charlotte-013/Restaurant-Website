@extends('admin.layouts.master')

@section('title', 'Contact List')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3 mb-5 text-center card-title">Contact List</h1>
                        <div class="mb-3 d-flex">

                            <div class="offset-8 col-4">
                                <form action="{{ route('contact#page') }}" method="GET">
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
                        @if (count($contacts) != 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Message</th>
                                            <th>Submitted</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr class="text-center tr-shadow">
                                                <td>{{ $contact->id }}</td>
                                                <td class="">{{ $contact->email }}</td>
                                                <td class="">{{ $contact->phone }}</td>
                                                <td class="">{{ Str::limit($contact->message, 15) }}</td>
                                                <td>{{ $contact->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('contact#detailPage', $contact->id) }}">
                                                            <button class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top" title="View">
                                                                <i class="fa-solid fa-eye text-info fs-5"></i>
                                                            </button></a>
                                                        <a href="{{ route('contact#delete', $contact->id) }}">
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
                            <h3 class="mt-5 text-center fs-5">No contacts yet.</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
@endsection
