@extends('admin.layouts.master')

@section('title', 'Menu List')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3 mb-5 text-center card-title">Menu List</h1>
                        <div class="mb-3 d-flex">
                            <div class="col-6">
                                <a href="{{ route('menu#createPage') }}">
                                    <button class="btn btn-md btn-outline-primary">
                                        <i class="fa-solid fa-plus me-2"></i> Add Menu
                                    </button>
                                </a>
                            </div>

                            <div class="col-4 offset-2">
                                <form action="{{ route('menu#page') }}" method="GET">
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
                        @if (count($menus) !== 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menus as $menu)
                                            <tr class="text-center tr-shadow">
                                                <td>{{ $menu->id }}</td>
                                                <td><img src="{{ asset('storage/' . $menu->image) }}" class="shadow-sm"
                                                        alt="{{ $menu->name }}"></td>
                                                <td class="">{{ $menu->name }}</td>
                                                <td class="">{{ $menu->category_name }}</td>
                                                <td class="">{{ $menu->price }} kyats</td>
                                                <td>{{ $menu->created_at->format('d/M/Y') }}</td>
                                                <td class="col-3">
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('menu#editPage', $menu->id) }}">
                                                            <button class="btn btn-sm "
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="fa-solid fa-pen-to-square text-primary fs-5"></i>
                                                            </button></a>
                                                        <a href="{{ route('menu#detailPage', $menu->id) }}">
                                                            <button class="btn btn-sm "
                                                                data-toggle="tooltip" data-placement="top" title="View">
                                                                <i class="fa-solid fa-eye text-info fs-5"></i>
                                                            </button></a>
                                                        <a href="{{ route('menu#delete', $menu->id) }}">
                                                            <button class="btn btn-sm "
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
                            <h3 class="mt-5 text-center fs-5">No menu. Create a new one!</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                {{ $menus->links() }}
            </div>
        </div>
    </div>
@endsection
