@extends('admin.layouts.master')

@section('title', 'Create Footer')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="p-3 card">
                    <div class="card-body">
                        <div class="btn">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="m-3 mb-5 text-center card-title">Create Footer</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('footer#create') }}" method="POST" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <label for="footer-facebook" class="mb-1 form-label">Facebook Url</label>
                                    <input type="url" name="facebookUrl" id="footer-facebook" value="{{ old('facebookUrl') }}" class="form-control @error('facebookUrl') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Facebook Url...">
                                    @error('facebookUrl')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-instagram" class="mb-1 form-label">Instagram Url</label>
                                    <input type="url" name="instagramUrl" id="footer-instagram" value="{{ old('instagramUrl') }}" class="form-control @error('instagramUrl') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Instagram Url...">
                                    @error('instagramUrl')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-twitter" class="mb-1 form-label">Twitter Url</label>
                                    <input type="url" name="twitterUrl" id="footer-twitter" value="{{ old('twitterUrl') }}" class="form-control @error('twitterUrl') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Twitter Url...">
                                    @error('twitterUrl')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-linkedin" class="mb-1 form-label">Linkedin Url</label>
                                    <input type="url" name="linkedinUrl" id="footer-linkedin" value="{{ old('linkedinUrl') }}" class="form-control @error('linkedinUrl') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Linkedin Url...">
                                    @error('linkedinUrl')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-address" class="mb-1 form-label">Address</label>
                                    <input type="text" name="address" id="footer-address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Address ...">
                                    @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-phone" class="mb-1 form-label">Phone</label>
                                    <input type="text" name="phone" id="footer-phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Phone ...">
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-email" class="mb-1 form-label">Email</label>
                                    <input type="email" name="email" id="footer-email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Email ...">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-openingTime1" class="mb-1 form-label">Opening Time 1</label>
                                    <input type="text" name="openingTime1" id="footer-openingTime1" value="{{ old('openingTime1') }}" class="form-control @error('openingTime1') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Opening Time 1...">
                                    @error('openingTime1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-openingTime2" class="mb-2 form-label">Opening Time 2</label>
                                    <input type="text" name="openingTime2" id="footer-openingTime2" value="{{ old('openingTime2') }}" class="form-control @error('openingTime2') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Opening Time 2...">
                                    @error('openingTime2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-closingTime1" class="mb-1 form-label">Closing Time 1</label>
                                    <input type="text" name="closingTime1" id="footer-closingTime1" value="{{ old('closingTime1') }}" class="form-control @error('closingTime1') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Closing Time 1...">
                                    @error('closingTime1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer-closingTime2" class="mb-2 form-label">Closing Time 2</label>
                                    <input type="text" name="closingTime2" id="footer-closingTime2" value="{{ old('closingTime2') }}" class="form-control @error('closingTime2') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Closing Time 2...">
                                    @error('closingTime2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <button class="btn btn-md btn-primary btn-block" type="submit">
                                        <span>Create</span>
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
