@extends('admin.layouts.master')

@section('title', 'About List')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-5 text-center card-title">About List</h1>
                        <div class="mb-3 d-flex">
                            <div class="col-6">
                                <a href="{{ route('about#createPage') }}">
                                    <button class="btn btn-md btn-outline-primary"
                                        @if (count($about) === 1) disabled @endif>
                                        <i class="fa-solid fa-plus me-2"></i> Add About
                                    </button>
                                </a>
                            </div>
                        </div>
                        @if (count($about) != 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Paragraph1</th>
                                            <th>Paragraph2</th
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($about as $a)
                                            <tr class="text-center tr-shadow">
                                                <td>{{ $a->id }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/'.$a->image) }}" alt="">
                                                </td>
                                                <td class="">{{ $a->title }}</td>
                                                <td class="">{{ $a->slug }}</td>
                                                <td class="">{{ Str::limit($a->paragraph1, 15) }}</td>
                                                <td class="">{{ Str::limit($a->paragraph2, 15) }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('about#editPage', $a->id) }}">
                                                            <button class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="fa-solid fa-pen-to-square text-primary fs-5"></i>
                                                            </button></a </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @else
                            <h3 class="mt-5 text-center text-black fs-5">No about. Create a new one!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

