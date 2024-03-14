@extends('admin.layouts.master')

@section('title', 'Contact Info')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="content-wrapper">
        <div class="">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card p-2">
                        <div class="card-body">
                            <div class="ms-5 btn">
                                <i class="fa-solid fa-arrow-left-long fs-4" onclick="history.back()"></i>
                            </div>
                            <div class="card-title">
                                <h2 class="text-center title-2">Contact Info</h2>
                            </div>
                            <hr>
                            <div class="row p-3">
                                <span class=" col-7 offset-2 mt-5">
                                    @if (!($contact->first_name === 'null' && $contact->last_name === 'null'))
                                        <h1 class="mb-4 fs-5"><i class="fa-solid fa-user me-2"></i>
                                            {{ $contact->first_name }} {{ $contact->last_name }}</h1>
                                    @endif
                                    <h3 class="mb-4 fs-5"><i class="fa-solid fa-at me-2"></i> {{ $contact->email }}
                                    </h3>
                                    <h3 class="mb-4 fs-5"><i class="fa-solid fa-phone me-2"></i> {{ $contact->phone }}
                                    </h3>
                                    <span class="mb-5 btn btn-sm bg-gradient-primary text-white"><i
                                            class="fa-solid fa-clock me-2"></i>
                                        {{ $contact->created_at->format('d-F-Y') }}</span>
                                    <p class="mb-3 fs-5 text-justify">{{ $contact->message }}</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
