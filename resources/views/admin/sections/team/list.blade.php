@extends('admin.layouts.master')

@section('title', 'Team List')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-5 text-center card-title">Team List</h1>
                        <div class="mb-3 d-flex">
                            <div class="col-6">
                                <a href="{{ route('team#createPage') }}">
                                    <button class="btn btn-md btn-outline-primary">
                                        <i class="fa-solid fa-plus me-2"></i> Add Team
                                    </button>
                                </a>
                            </div>

                            <div class="col-4 offset-2">
                                <form action="{{ route('team#page') }}" method="GET">
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
                        @if (count($team) != 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Position</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($team as $t)
                                            <tr class="text-center tr-shadow">
                                                <td>{{ $t->id }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $t->image) }}" alt="{{ $t->first_name }}" class="shadow-sm">
                                                </td>
                                                <td class="">{{ $t->first_name }}</td>
                                                <td class="">{{ $t->last_name }}</td>
                                                <td class="">{{ $t->position }}</td>
                                                <td>{{ $t->created_at->format('d-F-Y') }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('team#editPage', $t->id) }}">
                                                            <button class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="fa-solid fa-pen-to-square text-primary fs-5"></i>
                                                            </button></a>
                                                        <a href="{{ route('team#delete', $t->id) }}" onclick="confirmation(event)">
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
                            <h3 class="mt-5 text-center text-black fs-5">No team. Create a new one!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptSource')
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                    title: "Are you sure you want to delete this?",
                    text: "You won't be able to revert this.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                })
                .then((willCancel) => {
                    if (willCancel) {
                        window.location.href = urlToRedirect;
                    }
                });
        }
    </script>
@endsection
