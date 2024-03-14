@extends('admin.layouts.master')

@section('title', 'News List')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3 mb-5 text-center card-title">News List</h1>
                        <div class="mb-3 d-flex">
                            <div class="col-6">
                                <a href="{{ route('news#createPage') }}">
                                    <button class="btn btn-md btn-outline-primary">
                                        <i class="fa-solid fa-plus me-2"></i> Add News
                                    </button>
                                </a>
                            </div>

                            <div class="col-4 offset-2">
                                <form action="{{ route('news#page') }}" method="GET">
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
                        @if (count($news) !== 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as $n)
                                            <tr class="text-center tr-shadow">
                                                <td>{{ $n->id }}</td>
                                                <td><img src="{{ asset('storage/' . $n->image) }}" class="shadow-sm"
                                                        alt="{{ $n->title }}"></td>
                                                <td class="">{{ $n->title }}</td>
                                                <td class="">{{ Str::limit($n->sub_title, 10) }}</td>
                                                <td>{{ $n->created_at->format('d-F-Y') }}</td>
                                                <td class="col-3">
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('news#editPage', $n->id) }}">
                                                            <button class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="fa-solid fa-pen-to-square text-primary fs-5"></i>
                                                            </button></a>
                                                        <a href="{{ route('news#detailPage', $n->id) }}">
                                                            <button class="btn btn-sm "
                                                                data-toggle="tooltip" data-placement="top" title="View">
                                                                <i class="fa-solid fa-eye text-info fs-5"></i>
                                                            </button></a>
                                                        <a href="{{ route('news#delete', $n->id) }}">
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
                            <h3 class="mt-5 text-center fs-5">No news. Create a new one!</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection
