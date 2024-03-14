@extends('admin.layouts.master')

@section('title', 'Quote List')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="offset-lg-1 col-lg-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3 mb-5 text-center card-title">Quote</h1>
                        <div class="mb-3 d-flex">
                            <div class="col-6">
                                <a href="{{ route('quote#createPage') }}">
                                    <button class="btn btn-md btn-outline-primary"
                                        @if (count($quote) === 1) disabled @endif>
                                        <i class="fa-solid fa-plus me-2"></i> Add Quote
                                    </button>
                                </a>
                            </div>
                        </div>
                        @if (count($quote) != 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Quote</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quote as $q)
                                            <tr class="text-center tr-shadow">
                                                <td>{{ $q->id }}</td>
                                                <td class="">{{ $q->name }}</td>
                                                <td class="">{{ Str::limit($q->quote, 30) }}</td>
                                                <td>{{ $q->created_at->format('d-F-Y') }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('quote#editPage', $q->id) }}">
                                                            <button class="btn btn-sm"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="fa-solid fa-pen-to-square text-primary fs-5"></i>
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
                            <h3 class="mt-5 text-center text-black fs-5">No quote. Create a new one!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
