@extends('admin.layouts.master')

@section('title', 'Create Menu')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn ">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 mt-3 text-center">Create A Menu</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('menu#create') }}" method="post" novalidate="novalidate"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Menu Name</label>
                                        <input id="cc-payment" name="menuName" type="text" value="{{ old('menuName') }}"
                                            class="form-control @error('menuName') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Menu Name..." autofocus>
                                        @error('menuName')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Menu Description</label>
                                        <textarea name="menuDescription" id="cc-payment" cols="30" rows="10"
                                            class="form-control @error('menuDescription') is-invalid @enderror" aria-required="true" aria-invalid="false"
                                            placeholder="Menu Description...">{{ old('menuDescription') }}</textarea>
                                        @error('menuDescription')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Menu Category</label>
                                        <select name="menuCategory"
                                            class="form-control @error('menuCategory') is-invalid @enderror">
                                            <option value="">Choose Menu Category</option>
                                            @foreach ($categories as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('menuCategory')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Menu Price</label>
                                        <input id="cc-payment" name="menuPrice" type="number"
                                            value="{{ old('menuPrice') }}"
                                            class="form-control @error('menuPrice') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Menu Price...">
                                        @error('menuPrice')
                                            <div class="invalid-feedback mb-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Menu Image</label>
                                        <input id="cc-payment" name="menuImage" type="file"
                                            value="{{ old('menuImage') }}"
                                            class="form-control @error('menuImage') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Menu Image...">
                                        @error('menuImage')
                                            <div class="invalid-feedback mb-2">
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
