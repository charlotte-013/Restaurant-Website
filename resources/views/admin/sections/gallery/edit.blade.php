@extends('admin.layouts.master')

@section('title', 'Edit Gallery')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-2 grid-margin stretch-card">
                <div class="p-3 card">
                    <div class="card-body">
                        <div class="btn btn-md">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="mt-3 mb-5 text-center card-title">Edit A Gallery</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('gallery#update', $gallery->id) }}" method="post"
                                    novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="mb-1 control-label">Title</label>
                                        <input type="hidden" name="galleryId" class="form-control"
                                            value="{{ $gallery->id }}">
                                        <input id="cc-payment" name="title" type="text"
                                            value="{{ old('title', $gallery->title) }}"
                                            class="form-control @error('title') is-invalid @enderror" aria-required="true"
                                            aria-invalid="false" placeholder="Title...">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="mb-1 control-label">Image</label>
                                        <input id="gallery-name" name="image" type="file"
                                            value="{{ old('image', $gallery->image) }}"
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
                                            <span id="payment-button-amount">Update</span>
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
