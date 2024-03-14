<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
    <!-- plugins:css -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js
    "></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- website icon --}}
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="flex-row p-0 navbar default-layout col-lg-12 col-12 fixed-top d-flex align-items-top">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="{{ route('admin#dashboard') }}">
                        <img src="{{ asset('admin/images/logo.svg') }}" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{ route('admin#dashboard') }}">
                        <img src="{{ asset('admin/images/logo-mini.svg') }}" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Hello, <span
                                class="text-black fw-bold">{{ Auth::user()->name }}</span></h1>
                        <h3 class="welcome-sub-text">Your performance summary this week </h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-none d-lg-block">
                        <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                            <span class="input-group-addon input-group-prepend border-right">
                                <span class="icon-calendar input-group-text calendar-icon"></span>
                            </span>
                            <input type="text" class="form-control">
                        </div>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="notificationDropdown" href="#"
                            data-bs-toggle="dropdown">
                            <i class="icon-mail icon-lg"></i>
                        </a>
                        <div class="pb-0 dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <a class="py-3 dropdown-item border-bottom">
                                <p class="float-left mb-0 font-weight-medium">You have 4 new notifications </p>
                                <span class="float-right badge badge-pill badge-primary">View all</span>
                            </a>
                            <a class="py-3 dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <i class="m-auto mdi mdi-alert text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="mb-1 preview-subject fw-normal text-dark">Application Error</h6>
                                    <p class="mb-0 fw-light small-text"> Just now </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="icon-bell"></i>
                            <span class="count"></span>
                        </a>
                        <div class="pb-0 dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="countDropdown">
                            <a class="py-3 dropdown-item">
                                <p class="float-left mb-0 font-weight-medium">You have 7 unread mails </p>
                                <span class="float-right badge badge-pill badge-primary">View all</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="{{ asset('admin/images/faces/face8.jpg') }}" alt="image"
                                        class="img-sm profile-pic">
                                </div>
                                <div class="flex-grow py-2 preview-item-content">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                                    <p class="mb-0 fw-light small-text"> The meeting is cancelled </p>
                                </div>
                            </a>
                        </div>
                    </li> --}}
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @if (Auth::user()->avatar !== 'null')
                                <img class="img-xs rounded-circle"
                                    src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Profile image">
                            @else
                                <img src="{{ asset('images/default-avatar.webp') }}" alt="Profile image"
                                    class="img-xs rounded-circle">
                            @endif

                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="text-center dropdown-header">
                                @if (Auth::user()->avatar !== 'null')
                                    <img class="img-xs rounded-circle"
                                        src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile image">
                                @else
                                    <img src="{{ asset('images/default-avatar.webp') }}" alt="Profile image"
                                        class="img-xs rounded-circle">
                                @endif
                                <p class="mt-3 mb-1 font-weight-semibold">{{ Auth::user()->name }}</p>
                                <p class="mb-0 fw-light text-muted">{{ Auth::user()->email }}</p>
                            </div>
                            <a class="dropdown-item" href="{{ route('admin#page') }}"><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My
                                Profile </a>
                            <a class="dropdown-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn"><i
                                            class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign
                                        Out</button>
                                </form>
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin#dashboard') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#sections" aria-expanded="false"
                            aria-controls="sections">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Sections</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="sections">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('about#page') }}">About</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('team#page') }}">Team</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('quote#page') }}">Quote</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('gallery#page') }}">Gallery</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('footer#page') }}">Footer</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#menu" aria-expanded="false"
                            aria-controls="menu">
                            <i class="menu-icon mdi mdi-food"></i>
                            <span class="menu-title">Menu</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="menu">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('category#page') }}">Menu
                                        Categories</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('menu#page') }}">Menu
                                        Products</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#reservations" aria-expanded="false"
                            aria-controls="reservations">
                            <i class="menu-icon mdi mdi-book"></i>
                            <span class="menu-title">Reservation</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="reservations">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('reservations#page') }}">Reservations</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('reservationTime#page') }}">Reservation Times</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#events" aria-expanded="false"
                            aria-controls="events">
                            <i class="menu-icon mdi mdi-map-marker-radius"></i>
                            <span class="menu-title">Event</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="events">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('events#page') }}">Events</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('eventType#page') }}">Event
                                        Types</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('eventTime#page') }}">Event
                                        Times</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('eventBookings#page') }}">Event Bookings</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news#page') }}">
                            <i class="mdi mdi-newspaper menu-icon"></i>
                            <span class="menu-title">News</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact#page') }}">
                            <i class="mdi mdi-phone menu-icon"></i>
                            <span class="menu-title">Contact</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('newsletter#page') }}">
                            <i class="mdi mdi-email menu-icon"></i>
                            <span class="menu-title">Newsletter</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                @yield('content')

                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="float-none mt-1 text-center float-sm-right d-block mt-sm-0">Copyright © 2024. All
                            rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/progressbar.js/progressbar.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <script src="{{ asset('admin/js/settings.js') }}"></script>
    <script src="{{ asset('admin/js/todolist.js') }}"></script>
    <script src="{{ asset('admin/js/chart.js') }}"></script>
    <script src="{{ asset('admin/js/chartist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>
