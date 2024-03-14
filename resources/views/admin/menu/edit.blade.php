@extends('admin.layouts.master')

@section('title', 'Edit Menu')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="btn ">
                            <i class="fa-solid fa-arrow-left-long fs-5" onclick="history.back()"></i>
                        </div>
                        <h1 class="card-title mb-5 mt-3 text-center">Edit A Menu</h1>
                        <div class="mb-3">
                            <div class="row">
                                <form action="{{ route('menu#update', $menu->id) }}" method="post" novalidate="novalidate"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="menuId" class="form-control"
                                            value="{{ $menu->id }}">
                                        <label for="menu-name" class="form-label mb-1">Menu Name</label>
                                        <input id="menu-name" name="menuName" type="text"
                                            value="{{ old('menuName', $menu->name) }}"
                                            class="form-control @error('menuName') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Menu Name...">
                                        @error('menuName')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="menu-description" class="form-label mb-1">Menu Description</label>
                                        <textarea name="menuDescription" id="menu-description" cols="30" rows="10"
                                            class="form-control @error('menuDescription') is-invalid @enderror" aria-required="true" aria-invalid="false"
                                            placeholder="Menu Description...">{{ old('menuDescription', $menu->description) }}</textarea>
                                        @error('menuDescription')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Menu Category</label>
                                        <select name="menuCategory"
                                            class="form-control @error('menuCategory') is-invalid @enderror">
                                            <option value="">Choose Menu Category...</option>
                                            @foreach ($category as $c)
                                                <option value="{{ $c->id }}"
                                                    @if ($menu->category_id === $c->id) selected @endif>
                                                    {{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('menuCategory')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="menu-price" class="form-label mb-1">Menu Price</label>
                                        <input id="menu-price" name="menuPrice" type="number"
                                            value="{{ old('menuPrice', $menu->price) }}"
                                            class="form-control @error('menuPrice') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Menu Price...">
                                        @error('menuPrice')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="menu-image" class="form-label mb-1">Menu Image</label>
                                        <input id="menu-image" name="menuImage" type="file"
                                            value="{{ old('menuImage', $menu->image) }}"
                                            class="form-control @error('menuImage') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Menu Image...">
                                        @error('menuImage')
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
