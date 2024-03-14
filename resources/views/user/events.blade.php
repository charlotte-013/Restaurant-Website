@extends('user.layouts.main')

@section('title', 'Events at GoldenEight')

@section('content')
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb mb-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Check Out Our Events!</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <!-- Start event -->
    <div class="blog-box mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Latest Events</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="blog-box-inner">
                            <div class="event-img-box">
                                @if ($event->image === 'null')
                                    <img class="img-fluid" src="{{ asset('admin/images/no-image.png') }}" alt="No image">
                                @else
                                    <img class="img-fluid" src="{{ asset('storage/' . $event->image) }}"
                                        alt="{{ $event->title }}">
                                @endif
                            </div>
                            <div class="blog-detail">
                                <h2>{{ $event->title }}</h2>
                                <ul>
                                    <li class="fs-5"><span>{{ $event->event_date }}</span></li>
                                </ul>
                                <p class="fs-5">{{ Str::limit($event->description, 30) }}</p>
                                <a class="btn btn-lg btn-circle btn-outline-new-white"
                                    href="{{ route('user#eventDetail', $event->id) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-box-inner">
                        <div class="blog-img-box">
                            <img class="img-fluid" src="images/blog-img-02.jpg" alt="">
                        </div>
                        <div class="blog-detail">
                            <h4>Duis feugiat neque sed dolor cursus.</h4>
                            <p class="fs-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor
                                suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in
                                eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
                            <p class="fs-5">Sed semper orci sit amet porta placerat. Etiam quis finibus eros. </p>
                            <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Read More</a>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-md-12 pagination justify-content-center">
                    {{ $events->links('pagination::bootstrap-4') }}
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <button id="load_more_button" data-page="{{ $events->currentPage() + 1 }}"
                            class="mt-3 btn btn-lg btn-circle btn-common btn-outline-new-white">Load More</button>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- End event -->

    <div class="reservation-box mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="heading-title text-center">
                        <h2>Event Booking</h2>
                    </div>
                </div>
            </div>

            {{-- @if (session('error'))
                <div class="col-6 offset-6">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        @if (session('bookingSuccess'))
            <div class="col-6 offset-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-check"></i> {{ session('bookingSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif --}}

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="contact-block">
                        <form action="{{ route('user#eventBooking') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="firstName" class="fs-6 text-black">First Name</label>
                                            <input type="text" id="firstName" name="firstName"
                                                class="form-control @error('firstName') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('firstName') }}">
                                            @error('firstName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lastName" class="fs-6 text-black">Last Name</label>
                                            <input type="text" id="lastName" name="lastName"
                                                class="form-control @error('lastName') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('lastName') }}">
                                            @error('lastName')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="fs-6 text-black">Email</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone" class="fs-6 text-black">Phone Number</label>
                                            <input type="text" id="phone" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('phone') }}">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="eventType" class="fs-6 text-black">Type of Event</label>
                                            <select name="eventType" id="eventType"
                                                class="form-control @error('eventType') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('eventType') }}">
                                                <option value="null">Please Select</option>
                                                @foreach ($eventTypes as $eventType)
                                                    <option value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('eventType')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="eventBookingDate" class="fs-6 text-black">Date of Event</label>
                                            <input type="date" id="eventBookingDate" name="eventBookingDate"
                                                class="form-control @error('eventBookingDate') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('eventBookingDate') }}">
                                            @error('eventBookingDate')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="eventTime" class="fs-6 text-black">Time of Event</label>
                                            <select name="eventTime" id="eventTime"
                                                class="form-control @error('eventTime') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('eventTime') }}">
                                                <option value="null">Please Select</option>
                                                @foreach ($eventTimes as $eventTime)
                                                    <option value="{{ $eventTime->id }}">{{ $eventTime->time }}</option>
                                                @endforeach
                                            </select>
                                            @error('eventTime')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guestNumber" class="fs-6 text-black">Number of Guests</label>
                                            <input type="number" id="guestNumber" name="guestNumber"
                                                class="form-control @error('guestNumber') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" value="{{ old('guestNumber') }}">
                                            @error('guestNumber')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message" class="fs-6 text-black">Message</label>
                                            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" cols="10" rows="3">{{ old('message') }}</textarea>
                                            @error('message')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn btn-common btn-circle btn-outline-new-white"
                                            type="submit">Book
                                            Event</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- @section('scriptSource')
    <script>
        $(document).ready(function() {
            var start = 6;

            $('#load_more_button').click(function() {
                $.ajax({
                    url: "{{ route('user#loadMoreEvents') }}",
                    method: "GET",
                    data: {
                        start: start
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $('#load_more_button').html('Loading...');
                        $('#load_more_button').attr('disabled', true);
                    },
                    success: function(data) {

                        if (data.data.length > 0) {
                            var html = '';
                            for (var i = 0; i < data.data.length; i++) {
                                html += `<div class="col-lg-4 col-md-6 col-12">
                        <div class="blog-box-inner">
                            <div class="event-img-box">
                                @if (`+ data.data[i].image +` === 'null')
                                    <img class="img-fluid" src="{{ asset('admin/images/no-image.png') }}" alt="No image">
                                @else
                                    <img class="img-fluid" src="{{ asset('storage/' . `+ data.data[i].image +`) }}"
                                        alt="` + data.data[i].title + `">
                                @endif
                            </div>
                            <div class="blog-detail">
                                <h2>` + data.data[i].title + `</h2>
                                <ul>
                                    <li class="fs-5"><span>` + data.data[i].event_date + `</span></li>
                                    <li class="fs-5"><span>27 February 2018</span></li>
                                </ul>
                                <p class="fs-5">` + data.data[i].description + `</p>
                                <a class="btn btn-lg btn-circle btn-outline-new-white"
                                    href="{{ route('user#events', `+ data.data[i].id +`) }}">Read More</a>
                            </div>
                        </div>
                    </div>`;

                            }
                            //console.log(html);
                            //append data  without fade in effect
                            //$('#items_container').append(html);

                            //append data with fade in effect
                            $('#items_container').append($(html).hide().fadeIn(1000));
                            $('#load_more_button').html('Load More');
                            $('#load_more_button').attr('disabled', false);
                            start = data.next;
                        } else {
                            $('#load_more_button').html('No More Data Available');
                            $('#load_more_button').attr('disabled', true);
                        }
                    }
                });
            });
        });
    </script>

@endsection --}}
