@extends('admin.layouts.master')

@section('title', 'Create About Section')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 mt-3 text-center">Create About Section</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('about#create') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Title</label>
                                        <input id="cc-payment" name="Title" type="text"
                                            value="{{ old('Title') }}"
                                            class="form-control @error('Title') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Title..."
                                            autofocus>
                                        @error('Title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Slug</label>
                                        <input id="cc-payment" name="slug" type="text"
                                            value="{{ old('slug') }}"
                                            class="form-control @error('slug') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Slug..."
                                            >
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Paragraph 1</label>
                                        <input id="cc-payment" name="paragraph1" type="text"
                                            value="{{ old('paragraph1') }}"
                                            class="form-control @error('paragraph1') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Paragraph..."
                                            >
                                        @error('paragraph1')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Paragraph 2</label>
                                        <input id="cc-payment" name="paragraph2" type="text"
                                            value="{{ old('paragraph2') }}"
                                            class="form-control @error('paragraph2') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Paragraph..."
                                            >
                                        @error('paragraph2')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Image</label>
                                        <input id="cc-payment" name="image" type="file"
                                            value="{{ old('image') }}"
                                            class="form-control @error('image') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Image..."
                                            >
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
