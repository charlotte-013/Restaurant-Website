@extends('admin.layouts.master')

@section('title', 'Newsletter Submission List')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-5 mt-3">Newsletter Submission List</h1>
                        <div class="mb-3 d-flex">

                            <div class="offset-8 col-4">
                                <form action="{{ route('newsletter#page') }}" method="GET">
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
                        @if (count($newsletters) != 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Submitted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($newsletters as $newsletter)
                                            <tr class="tr-shadow text-center">
                                                <td>{{ $newsletter->id }}</td>
                                                <td class="">{{ $newsletter->email }}</td>
                                                <td>{{ $newsletter->created_at->format('d-F-Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @else
                            <h3 class="text-center mt-5 fs-5">No submissions yet.</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                {{ $newsletters->links() }}
            </div>
        </div>
    </div>
@endsection
