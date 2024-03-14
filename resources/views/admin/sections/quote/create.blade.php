@extends('admin.layouts.master')

@section('title', 'Create Quote')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="offset-lg-2 col-lg-8 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn ">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 mt-3 text-center">Create A Quote</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('quote#create') }}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Name</label>
                                        <input id="cc-pament" name="name" type="text" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror" aria-required="true"
                                            aria-invalid="false" placeholder="Name..." autofocus>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Quote</label>
                                        <input id="cc-pament" name="quote" type="text" value="{{ old('quote') }}"
                                            class="form-control @error('quote') is-invalid @enderror" aria-required="true"
                                            aria-invalid="false" placeholder="Quote...">
                                        @error('quote')
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
