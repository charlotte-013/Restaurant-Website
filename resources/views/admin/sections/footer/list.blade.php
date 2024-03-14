@extends('admin.layouts.master')

@section('title', 'Footer List')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3 mb-5 text-center card-title">Footer List</h1>
                        <div class="mb-3 d-flex">
                            <div class="col-6">
                                <a href="{{ route('footer#createPage') }}">
                                    <button class="btn btn-md btn-outline-primary"
                                        @if (count($footer) === 1) disabled @endif><i
                                            class="fa-solid fa-plus me-2"></i> Add Footer</button></a>
                            </div>
                        </div>
                        @if (count($footer) != 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Facebook</th>
                                            <th>Instagram</th>
                                            <th>Twitter</th>
                                            <th>LinkedIn</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($footer as $f)
                                            <tr class="text-center tr-shadow">
                                                <td>{{ $f->id }}</td>
                                                <td>{{ $f->address }}</td>
                                                <td>{{ $f->phone }}</td>
                                                <td>{{ $f->email }}</td>
                                                <td>{{ $f->facebook_url }}</td>
                                                <td>{{ $f->instagram_url }}</td>
                                                <td>{{ $f->twitter_url }}</td>
                                                <td>{{ $f->linkedin_url }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('footer#editPage', $f->id) }}">
                                                            <button class="btn btn-sm" data-toggle="tooltip"
                                                                data-placement="top" title="Edit"></button><i
                                                                class="fa-solid fa-pen-to-square text-primary fs-5"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h3 class="mt-5 text-center text-black fs-5">No footer. Create a new one!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
