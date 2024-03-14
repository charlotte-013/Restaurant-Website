@extends('admin.layouts.master')

@section('title', 'Category List')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-4 mb-5 text-center card-title">Category List</h1>
                        <div class="mb-3 d-flex">
                            <div class="col-6">
                                <a href="{{ route('category#createPage') }}">
                                    <button class="btn btn-md btn-outline-primary">
                                        <i class="fa-solid fa-plus me-2"></i> Add Category
                                    </button>
                                </a>
                            </div>

                            <div class="col-4 offset-2">
                                <form action="{{ route('category#page') }}" method="GET">
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
                        @if (count($categories) != 0)
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
                                        @foreach ($categories as $category)
                                            <tr class="text-center tr-shadow">
                                                <td>{{ $category->id }}</td>
                                                <td class="col-4">{{ $category->name }}</td>
                                                <td>{{ $category->created_at->format('d-F-Y') }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('category#editPage', $category->id) }}">
                                                            <button class="btn btn-sm" data-toggle="tooltip"
                                                                data-placement="top" title="Edit">
                                                                <i class="fa-solid fa-pen-to-square text-primary fs-5"></i>
                                                            </button></a>
                                                        <a href="{{ route('category#delete', $category->id) }}">
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
                            <h3 class="mt-5 text-center text-black fs-5">No category. Create a new one!</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
