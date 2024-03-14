@extends('admin.layouts.master')

@section('title', 'Menu Info')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="content-wrapper">
        <div class="">
            <div class="container-fluid">
                <div class="col-lg-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="ms-5 btn ">
                                <i class="fa-solid fa-arrow-left-long fs-4" onclick="history.back()"></i>
                            </div>
                            <div class="card-title">
                                <h2 class="text-center title-2">Menu Info</h2>
                            </div>
                            <hr>
                            <div class="row p-2">
                                <div class="col-md-3 offset-md-1 col-lg-3 offset-lg-1 mt-5 mb-5">
                                    @if ($menu->image !== 'null')
                                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                                            class="img-thumbnail shadow-sm">
                                    @else
                                        <img src="{{ asset('admin/images/no-image.png') }}" alt="no image"
                                            class="img-thumbnail shadow-sm">
                                    @endif
                                </div>
                                <div class="offset-md-1 col-md-7">
                                    <h3 class="mb-5 mt-5 text-center">{{ $menu->name }}</h3>
                                    <div class=" flex mb-5 text-center">
                                        <span class=" btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-clipboard-list me-2"></i>
                                            {{ $menu->category_name }}</span>
                                        <span class=" btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-money-bill-1-wave me-2"></i> {{ $menu->price }}
                                            kyats</span>
                                        <span class=" btn btn-sm bg-gradient-primary text-white"><i
                                                class="fa-solid fa-clock me-2"></i>
                                            {{ $menu->created_at->format('d/F/Y') }}</span>
                                    </div>
                                    <p class="mb-3 fs-6 text-center">{{ $menu->description }}</p>
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
