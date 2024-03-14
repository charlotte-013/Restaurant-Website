@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row statistics-details d-flex align-items-center justify-content-between">
                                    <div class="px-3 py-3 bg-white border-2 col-sm-2">
                                        <p class="statistics-title">Admin</p>
                                        <h3 class="rate-percentage">{{ count($admin) }}</h3>
                                    </div>
                                    <div class="px-3 py-3 bg-white border-2 col-sm-2">
                                        <p class="statistics-title">Subscribers</p>
                                        <h3 class="rate-percentage">{{ count($newsletters) }}</h3>
                                    </div>
                                    <div class="px-3 py-3 bg-white border-2 col-sm-2">
                                        <p class="statistics-title">Reservations</p>
                                        <h3 class="rate-percentage">{{ count($reservations) }}</h3>
                                    </div>
                                    <div class="px-3 py-3 bg-white border-2 col-sm-2">
                                        <p class="statistics-title">Events</p>
                                        <h3 class="rate-percentage">{{ count($events) }}</h3>
                                    </div>
                                    <div class="px-3 py-3 bg-white border-2 col-sm-2">
                                        <p class="statistics-title">Event Bookings</p>
                                        <h3 class="rate-percentage">{{ count($eventBookings) }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 grid-margin d-flex flex-column">
                                <h2 class="mt-3 mb-5 text-center card-title card-title-dash">Admin list</h2>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Created</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admin as $a)
                                                <tr class="text-center tr-shadow">
                                                    <td class="col-1">{{ $a->id }}</td>
                                                    <td class="col-1">
                                                        @if ($a->image == null)
                                                            <img src="{{ asset('images/default-avatar.webp') }}"
                                                                alt="default-user">
                                                        @else
                                                            <img src="{{ asset('storage/' . $a->image) }}"
                                                                class="shadow-sm img-thumbnail">
                                                        @endif
                                                    </td>
                                                    <td class="col-2">{{ $a->name }}</td>
                                                    <td class="col-3">{{ $a->email }}</td>
                                                    <td class="col-2">{{ $a->created_at->format('d-F-Y') }}</td>
                                                    <td class="col-1">
                                                        <div class="table-data-feature">
                                                            @if (Auth::user()->id != $a->id || !(Auth::user()->id !== '1'))
                                                                <a href="{{ route('admin#delete', $a->id) }}">
                                                                    <button class="btn btn-sm" data-toggle="tooltip"
                                                                        data-placement="top" title="Delete">
                                                                        <i
                                                                            class="fa-solid fa-trash-can text-danger fs-5"></i>
                                                                    </button>
                                                                </a>
                                                            @endif

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- <div class="mt-3">
                                        {{ $admin->links() }}
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <div class="col-lg-4 d-flex flex-column">
                                <div class="row">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <h4 class="card-title card-title-dash">Todo list</h4>
                                                            <div class="mb-0 add-items d-flex">
                                                                <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                                                <button
                                                                    class="text-white add btn btn-icons btn-rounded btn-primary todo-list-add-btn me-0 pl-12p"><i
                                                                        class="mdi mdi-plus"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="list-wrapper">
                                                            <ul class="todo-list todo-list-rounded">
                                                                <li class="d-block">
                                                                    <div class="form-check w-100">
                                                                        <label class="form-check-label">
                                                                            <input class="checkbox" type="checkbox">
                                                                            Lorem Ipsum is simply dummy text of the
                                                                            printing <i class="rounded input-helper"></i>
                                                                        </label>
                                                                        <div class="mt-2 d-flex">
                                                                            <div class="ps-4 text-small me-3">24 June
                                                                                2020</div>
                                                                            <div class="badge badge-opacity-warning me-3">
                                                                                Due tomorrow</div>
                                                                            <i class="mdi mdi-flag ms-2 flag-color"></i>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="d-block">
                                                                    <div class="form-check w-100">
                                                                        <label class="form-check-label">
                                                                            <input class="checkbox" type="checkbox">
                                                                            Lorem Ipsum is simply dummy text of the
                                                                            printing <i class="rounded input-helper"></i>
                                                                        </label>
                                                                        <div class="mt-2 d-flex">
                                                                            <div class="ps-4 text-small me-3">23 June
                                                                                2020</div>
                                                                            <div class="badge badge-opacity-success me-3">
                                                                                Done</div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check w-100">
                                                                        <label class="form-check-label">
                                                                            <input class="checkbox" type="checkbox">
                                                                            Lorem Ipsum is simply dummy text of the
                                                                            printing <i class="rounded input-helper"></i>
                                                                        </label>
                                                                        <div class="mt-2 d-flex">
                                                                            <div class="ps-4 text-small me-3">24 June
                                                                                2020</div>
                                                                            <div class="badge badge-opacity-success me-3">
                                                                                Done</div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="border-bottom-0">
                                                                    <div class="form-check w-100">
                                                                        <label class="form-check-label">
                                                                            <input class="checkbox" type="checkbox">
                                                                            Lorem Ipsum is simply dummy text of the
                                                                            printing <i class="rounded input-helper"></i>
                                                                        </label>
                                                                        <div class="mt-2 d-flex">
                                                                            <div class="ps-4 text-small me-3">24 June
                                                                                2020</div>
                                                                            <div class="badge badge-opacity-danger me-3">
                                                                                Expired</div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection
