@extends('admin.layouts.master')

@section('title', 'Gallery')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mt-3 mb-5 text-center card-title">Gallery List</h1>
                        <div class="mb-3 d-flex">
                            <div class="col-6">
                                <a href="{{ route('gallery#createPage') }}">
                                    <button class="btn btn-md btn-outline-primary">
                                        <i class="fa-solid fa-plus me-2"></i> Add Gallery
                                    </button>
                                </a>
                            </div>
                        </div>
                        @if (count($galleries) != 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($galleries as $gallery)
                                            <tr class="text-center tr-shadow">
                                                <td>{{ $gallery->id }}</td>
                                                <td class="">
                                                    <img src="{{ asset('storage/' . $gallery->image) }}"
                                                        alt="{{ $gallery->title }}" class="shadow-sm">
                                                </td>
                                                <td>{{ $gallery->title }}</td>
                                                <td>{{ $gallery->created_at->format('d-F-Y') }}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('gallery#editPage', $gallery->id) }}">
                                                            <button class="btn btn-sm" data-toggle="tooltip"
                                                                data-placement="top" title="Edit">
                                                                <i class="fa-solid fa-pen-to-square text-primary fs-5"></i>
                                                            </button></a>
                                                        <a href="{{ route('gallery#delete', $gallery->id) }}"
                                                            onclick="confirmation(event)">
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
                            <h3 class="mt-5 text-center text-black fs-5">No gallery. Create a new one!</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                {{ $galleries->links() }}
            </div>
        </div>
    </div>
@endsection

@section('scriptSource')
    <script type="text/javascript">
        function confirmation(event) {
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                title: "Are you sure you want to delete this?",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
@endsection
