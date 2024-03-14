@extends('admin.layouts.master')

@section('title', 'News Info')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="content-wrapper">
        <div class="">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="ms-5 btn ">
                                <i class="fa-solid fa-arrow-left-long fs-4" onclick="history.back()"></i>
                            </div>
                            <div class="card-title">
                                <h2 class="text-center title-2">News Info</h2>
                            </div>
                            <hr>
                            <div class="row p-2">
                                <div class="col-md-3 offset-md-1 col-lg-3 offset-lg-1 mt-5 mb-5">
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                        class="img-thumbnail shadow-sm mt-3">
                                </div>
                                <div class="offset-md-1 col-md-7">
                                    <h2 class="mb-3  mt-5 text-center">{{ $news->title }}</h2>
                                    <h3 class="mb-4 fs-5 text-center">{{ $news->sub_title }}</h3>
                                    <div class=" flex mb-1 text-center">
                                        <span class="mb-5 btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-clock me-2"></i>
                                            {{ $news->created_at->format('d-F-Y') }}</span>
                                    </div>

                                    <p class="mb-3 fs-6 text-center">{{ $news->content }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

@endsection
