@extends('admin.layouts.master')

@section('title', 'Edit Footer')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 m-3 text-center">Edit Footer</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('footer#update', $footer->id) }}" method="POST" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="footerId" class="form-control" value="{{ $footer->id }}">
                                    <label for="footer-facebook" class="form-label mb-1">Facebook Url</label>
                                    <input type="url" name="facebookUrl" id="footer-facebook" value="{{ old('facebookUrl', $footer->facebook_url) }}" class="form-control @error('facebookUrl') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Facebook Url...">
                                    @error('facebookUrl')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-instagram" class="form-label mb-1">Instagram Url</label>
                                    <input type="url" name="instagramUrl" id="footer-instagram" value="{{ old('instagramUrl', $footer->instagram_url) }}" class="form-control @error('instagramUrl') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Instagram Url...">
                                    @error('instagramUrl')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-twitter" class="form-label mb-1">Twitter Url</label>
                                    <input type="url" name="twitterUrl" id="footer-twitter" value="{{ old('twitterUrl', $footer->twitter_url) }}" class="form-control @error('twitterUrl') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Twitter Url...">
                                    @error('twitterUrl')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-linkedin" class="form-label mb-1">Linkedin Url</label>
                                    <input type="url" name="linkedinUrl" id="footer-linkedin" value="{{ old('linkedinUrl', $footer->linkedin_url) }}" class="form-control @error('linkedinUrl') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Linkedin Url...">
                                    @error('linkedinUrl')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-address" class="form-label mb-1">Address</label>
                                    <input type="text" name="address" id="footer-address" value="{{ old('address', $footer->address) }}" class="form-control @error('address') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Address ...">
                                    @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-phone" class="form-label mb-1">Phone</label>
                                    <input type="text" name="phone" id="footer-phone" value="{{ old('phone', $footer->phone) }}" class="form-control @error('phone') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Phone ...">
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-email" class="form-label mb-1">Email</label>
                                    <input type="email" name="email" id="footer-email" value="{{ old('email', $footer->email) }}" class="form-control @error('email') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Email ...">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-openingTime1" class="form-label mb-1">Opening Time 1</label>
                                    <input type="text" name="openingTime1" id="footer-openingTime1" value="{{ old('openingTime1', $footer->opening_time1) }}" class="form-control @error('openingTime1') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Opening Time 1...">
                                    @error('openingTime1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-openingTime2" class="form-label mb-2">Opening Time 2</label>
                                    <input type="text" name="openingTime2" id="footer-openingTime2" value="{{ old('openingTime2', $footer->opening_time2) }}" class="form-control @error('openingTime2') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Opening Time 2...">
                                    @error('openingTime2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-closingTime1" class="form-label mb-1">Closing Time 1</label>
                                    <input type="text" name="closingTime1" id="footer-closingTime1" value="{{ old('closingTime1', $footer->closing_time1) }}" class="form-control @error('closingTime1') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Closing Time 1...">
                                    @error('closingTime1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-closingTime2" class="form-label mb-2">Closing Time 2</label>
                                    <input type="text" name="closingTime2" id="footer-closingTime2" value="{{ old('closingTime2', $footer->closing_time2) }}" class="form-control @error('closingTime2') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Closing Time 2...">
                                    @error('closingTime2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <button class="btn btn-md btn-primary btn-block" type="submit">
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
