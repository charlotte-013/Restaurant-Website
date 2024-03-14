@extends('admin.layouts.master')

@section('title', 'Edit About')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="p-3 card">
                    <div class="card-body">
                        <div class="btn">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="mt-3 mb-5 text-center card-title">Edit About</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('about#update', $about->id) }}" method="POST"
                                    novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="aboutId" class="form-control"
                                            value="{{ $about->id }}">
                                        <label for="about-title" class="mb-1 form-label">Title</label>
                                        <input id="about-title" name="title" type="text"
                                            value="{{ old('title', $about->title) }}"
                                            class="form-control @error('title') is-invalid @enderror" aria-required="true"
                                            aria-invalid="false" placeholder="Title...">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="about-slug" class="mb-1 form-label">Slug</label>
                                        <input id="about-slug" name="slug" type="text"
                                            value="{{ old('slug', $about->slug) }}"
                                            class="form-control @error('slug') is-invalid @enderror" aria-required="true"
                                            aria-invalid="false" placeholder="Slug...">
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="paragraph1" class="mb-1 form-label">Paragraph 1</label>
                                        <input id="paragraph1" name="paragraph1" type="text"
                                            value="{{ old('paragraph1', $about->paragraph1) }}"
                                            class="form-control @error('paragraph1') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Paragraph...">
                                        @error('paragraph1')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="paragraph2" class="mb-1 form-label">Paragraph 2</label>
                                        <input id="paragraph2" name="paragraph2" type="text"
                                            value="{{ old('paragraph2', $about->paragraph2) }}"
                                            class="form-control @error('paragraph2') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Paragraph...">
                                        @error('paragraph2')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="team-image" class="mb-1 form-label">Image</label>
                                        <input id="team-image" name="image" type="file"
                                            value="{{ old('image', $about->image) }}"
                                            class="form-control @error('image') is-invalid @enderror" aria-required="true"
                                            aria-invalid="false" placeholder="Image...">
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-md btn-primary btn-block">
                                            <span>Update</span>

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
