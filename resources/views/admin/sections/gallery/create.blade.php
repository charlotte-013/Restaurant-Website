@extends('admin.layouts.master')

@section('title', 'Create Gallery')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 mt-3 text-center">Create A Gallery</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('gallery#create') }}" method="post" novalidate="novalidate"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Title</label>
                                        <input id="cc-payment" name="title" type="text" value="{{ old('title') }}"
                                            class="form-control @error('title') is-invalid @enderror" aria-required="true"
                                            aria-invalid="false" placeholder="Title..." autofocus>
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Image</label>
                                        <input id="cc-payment" name="image" type="file" value="{{ old('image') }}"
                                            class="form-control @error('image') is-invalid @enderror" aria-required="true"
                                            aria-invalid="false" placeholder="Image...">
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-md btn-primary btn-block">
                                            <span id="payment-button-amount">Create</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
