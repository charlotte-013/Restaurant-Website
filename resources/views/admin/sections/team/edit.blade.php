@extends('admin.layouts.master')

@section('title', 'Edit Team')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="p-3 card">
                    <div class="card-body">
                        <div class="btn">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="mt-3 mb-5 text-center card-title">Edit Team</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('team#update', $team->id) }}" method="POST"
                                    novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="teamId" class="form-control"
                                            value="{{ $team->id }}">
                                            <label for="first-name" class="mb-1 form-label">First Name</label>
                                        <input id="first-name" name="firstName" type="text"
                                            value="{{ old('firstName', $team->first_name) }}"
                                            class="form-control @error('firstName') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="First Name...">
                                        @error('firstName')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="last-name" class="mb-1 form-label">Last Name</label>
                                        <input id="last-name" name="lastName" type="text"
                                            value="{{ old('lastName', $team->last_name) }}"
                                            class="form-control @error('lastName') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Last Name...">
                                        @error('lastName')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="team-position" class="mb-1 form-label">Position</label>
                                        <input id="team-position" name="position" type="text"
                                            value="{{ old('position', $team->position) }}"
                                            class="form-control @error('position') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Position...">
                                        @error('position')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="team-image" class="mb-1 form-label">Image</label>
                                        <input type="file" name="image" id="team-image" value="{{ old('image', $team->image) }}" class="form-control @error('image') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Image...">
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
