@extends('admin.layouts.master')

@section('title', 'Create News')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 mt-3 text-center">Create News</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('news#create') }}" method="post" novalidate="novalidate"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Title</label>
                                        <input id="cc-pament" name="newsTitle" type="text" value="{{ old('newsTitle') }}"
                                            class="form-control @error('newsTitle') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="News Title..." autofocus>
                                        @error('newsTitle')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Sub Title</label>
                                        <input id="cc-pament" name="newsSubTitle" type="text"
                                            value="{{ old('newsSubTitle') }}"
                                            class="form-control @error('newsSubTitle') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="News Sub Title...">
                                        @error('newsSubTitle')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Content</label>
                                        <textarea name="newsContent" id="cc-payment" cols="30" rows="10"
                                            class="form-control @error('newsContent') is-invalid @enderror" aria-required="true" aria-invalid="false"
                                            placeholder="News Content...">{{ old('newsContent') }}</textarea>
                                        @error('newsContent')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Image</label>
                                        <input id="cc-pament" name="newsImage" type="file" value="{{ old('newsImage') }}"
                                            class="form-control @error('newsImage') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="News Image...">
                                        @error('newsImage')
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
