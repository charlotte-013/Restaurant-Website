@extends('admin.layouts.master')

@section('title', 'Edit News')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn ">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 mt-3 text-center">Edit News</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('news#update', $news->id) }}" method="post" novalidate="novalidate"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="newsId" class="form-control"
                                            value="{{ $news->id }}">
                                        <label for="news-title" class="form-label mb-1">Title</label>
                                        <input id="news-title" name="newsTitle" type="text"
                                            value="{{ old('newsTitle', $news->title) }}"
                                            class="form-control @error('newsTitle') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="News Title...">
                                        @error('newsTitle')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="news-subtitle" class="form-label mb-1">Sub Title</label>
                                        <input id="news-subtitle" name="newsSubTitle" type="text"
                                            value="{{ old('newsSubTitle', $news->sub_title) }}"
                                            class="form-control @error('newsSubTitle') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="News Sub Title...">
                                        @error('newsSubTitle')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="news-content" class="form-label mb-1">Content</label>
                                        <textarea name="newsContent" id="news-content" cols="30" rows="10"
                                            class="form-control @error('newsContent') is-invalid @enderror" aria-required="true" aria-invalid="false"
                                            placeholder="News Content...">{{ old('newsContent', $news->content) }}</textarea>
                                        @error('newsContent')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="news-image" class="form-label mb-1">Image</label>
                                        <input id="news-image" name="newsImage" type="file"
                                            value="{{ old('newsImage', $news->image) }}"
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
