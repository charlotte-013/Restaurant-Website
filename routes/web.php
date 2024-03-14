<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventTypeController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\User\UserContactController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\SpecialDishController;
use App\Http\Controllers\Admin\TeamSectionController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\EventBookingController;
use App\Http\Controllers\Admin\QuoteSectionController;
use App\Http\Controllers\Admin\BannerSectionController;
use App\Http\Controllers\Admin\EventTimeController;
use App\Http\Controllers\Admin\FooterSectionController;
use App\Http\Controllers\Admin\ReservationTimeController;
use App\Http\Controllers\User\UserEventBookingController;
use App\Http\Controllers\User\UserReservationController;

// user home
Route::redirect('/', 'goldeneight/home/page');


// admin login page
Route::middleware('role')->group(function () {
    Route::get('admin/login', [RoleController::class, 'adminLoginPage'])->name('admin#login');
});


Route::middleware('auth')->group(function () {

    Route::middleware('admin_auth')->group(function () {
        // admin
        Route::group(['prefix' => 'admin', 'as' => 'admin#'], function () {
            // dashboard
            Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
            Route::get('delete/{id}', [AdminController::class, 'delete'])->name('delete');

            // profile
            Route::get('profile', [AdminController::class, 'profile'])->name('page');
            Route::get('edit', [AdminController::class, 'editPage'])->name('editPage');
            Route::post('update/{id}', [AdminController::class, 'update'])->name('update');
            // Route::get('delete', [AdminController::class, 'deleteAccount'])->name('deleteAccount');

            // change password
            Route::get('change/password-page', [AdminController::class, 'changePasswordPage'])->name('changePasswordPage');
            Route::post('change/password', [AdminController::class, 'changePassword'])->name('changePassword');
        });

        // Section
        // about
        Route::group(['prefix' => 'about', 'as' => 'about#'], function () {
            Route::get('page', [AboutSectionController::class, 'index'])->name('page');
            Route::get('create-page', [AboutSectionController::class, 'createPage'])->name('createPage');
            Route::post('create', [AboutSectionController::class, 'create'])->name('create');
            Route::get('edit-page/{id}', [AboutSectionController::class, 'edit'])->name('editPage');
            Route::post('update/{id}', [AboutSectionController::class, 'update'])->name('update');
        });


        // team
        Route::group(['prefix' => 'team', 'as' => 'team#'], function () {
            Route::get('page', [TeamSectionController::class, 'index'])->name('page');
            Route::get('create-page', [TeamSectionController::class, 'createPage'])->name('createPage');
            Route::post('create', [TeamSectionController::class, 'create'])->name('create');
            Route::get('edit-page/{id}', [TeamSectionController::class, 'edit'])->name('editPage');
            Route::get('delete/{id}', [TeamSectionController::class, 'delete'])->name('delete');
            Route::post('update/{id}', [TeamSectionController::class, 'update'])->name('update');
        });


        // quote
        Route::group(['prefix' => 'quote', 'as' => 'quote#'], function () {
            Route::get('page', [QuoteSectionController::class, 'index'])->name('page');
            Route::get('create-page', [QuoteSectionController::class, 'createPage'])->name('createPage');
            Route::post('create', [QuoteSectionController::class, 'create'])->name('create');
            Route::get('edit-page/{id}', [QuoteSectionController::class, 'edit'])->name('editPage');
            Route::post('update/{id}', [QuoteSectionController::class, 'update'])->name('update');
        });

        // gallery
        Route::group(['prefix' => 'gallery', 'as' => 'gallery#'],function () {
            Route::get('page', [GalleryController::class, 'index'])->name('page');
            Route::get('create-page', [GalleryController::class, 'createPage'])->name('createPage');
            Route::post('create', [GalleryController::class, 'create'])->name('create');
            Route::get('edit-page/{id}', [GalleryController::class, 'edit'])->name('editPage');
            Route::get('delete/{id}', [GalleryController::class, 'delete'])->name('delete');
            Route::post('update/{id}', [GalleryController::class, 'update'])->name('update');
        });

        // footer
        Route::group(['prefix' => 'footer', 'as' => 'footer#'], function () {
            Route::get('page', [FooterSectionController::class, 'index'])->name('page');
            Route::get('create-page', [FooterSectionController::class, 'createPage'])->name('createPage');
            Route::post('create', [FooterSectionController::class, 'create'])->name('create');
            Route::get('edit-page/{id}', [FooterSectionController::class, 'edit'])->name('editPage');
            Route::post('update/{id}', [FooterSectionController::class, 'update'])->name('update');
        });


        // Menu
        // category
        Route::group(['prefix' => 'category', 'as' => 'category#'], function () {
            Route::get('page', [CategoryController::class, 'index'])->name('page');
            Route::get('create-page', [CategoryController::class, 'createPage'])->name('createPage');
            Route::post('create', [CategoryController::class, 'create'])->name('create');
            Route::get('edit-page/{id}', [CategoryController::class, 'edit'])->name('editPage');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        });

        // menu
        Route::group(['prefix' => 'menu', 'as' => 'menu#'], function () {
            Route::get('page', [MenuController::class, 'index'])->name('page');
            Route::get('create-page', [MenuController::class, 'createPage'])->name('createPage');
            Route::post('create', [MenuController::class, 'create'])->name('create');
            Route::get('detail/{id}', [MenuController::class, 'detailPage'])->name('detailPage');
            Route::get('edit-page/{id}', [MenuController::class, 'edit'])->name('editPage');
            Route::post('update/{id}', [MenuController::class, 'update'])->name('update');
            Route::get('delete/{id}', [MenuController::class, 'delete'])->name('delete');
        });


        // Reservation
        // reservation-time
        Route::group(['prefix' => 'reservation-time', 'as' => 'reservationTime#'], function () {
            Route::get('page', [ReservationTimeController::class, 'index'])->name('page');
            Route::get('create-page', [ReservationTimeController::class, 'createPage'])->name('createPage');
            Route::post('create', [ReservationTimeController::class, 'create'])->name('create');
            Route::get('edit-page/{id}', [ReservationTimeController::class, 'edit'])->name('editPage');
            Route::post('update/{id}', [ReservationTimeController::class, 'update'])->name('update');
            Route::get('delete/{id}', [ReservationTimeController::class, 'delete'])->name('delete');
        });

        // reservations
        Route::group(['prefix' => 'reservations', 'as' => 'reservations#'], function () {
            Route::get('page', [ReservationController::class, 'index'])->name('page');
            Route::get('detail/{id}', [ReservationController::class, 'detailPage'])->name('detailPage');
            Route::get('delete/{id}', [ReservationController::class, 'delete'])->name('delete');
        });


        // Event
        // event
        Route::group(['prefix' => 'events', 'as' => 'events#'], function () {
            Route::get('page', [EventController::class, 'index'])->name('page');
            Route::get('create-page', [EventController::class, 'createPage'])->name('createPage');
            Route::post('create', [EventController::class, 'create'])->name('create');
            Route::get('detail/{id}', [EventController::class, 'detailPage'])->name('detailPage');
            Route::get('edit-page/{id}', [EventController::class, 'edit'])->name('editPage');
            Route::post('update/{id}', [EventController::class, 'update'])->name('update');
            Route::get('delete/{id}', [EventController::class, 'delete'])->name('delete');
        });

        // event type
        Route::group(['prefix' => 'event-type', 'as' => 'eventType#'], function () {
            Route::get('page', [EventTypeController::class, 'index'])->name('page');
            Route::get('create-page', [EventTypeController::class, 'createPage'])->name('createPage');
            Route::post('create', [EventTypeController::class, 'create'])->name('create');
            Route::get('edit-page/{id}', [EventTypeController::class, 'edit'])->name('editPage');
            Route::post('update/{id}', [EventTypeController::class, 'update'])->name('update');
            Route::get('delete/{id}', [EventTypeController::class, 'delete'])->name('delete');
        });

        // event time
        Route::group(['prefix' => 'event-time', 'as' => 'eventTime#'], function () {
            Route::get('page', [EventTimeController::class, 'index'])->name('page');
            Route::get('create-page', [EventTimeController::class, 'createPage'])->name('createPage');
            Route::post('create', [EventTimeController::class, 'create'])->name('create');
            Route::get('edit-page/{id}', [EventTimeController::class, 'edit'])->name('editPage');
            Route::post('update/{id}', [EventTimeController::class, 'update'])->name('update');
        });

        // event bookings
        Route::group(['prefix' => 'event-bookings', 'as' => 'eventBookings#'], function () {
            Route::get('page', [EventBookingController::class, 'index'])->name('page');
            Route::get('detail/{id}', [EventBookingController::class, 'detailPage'])->name('detailPage');
            Route::get('delete/{id}', [EventBookingController::class, 'delete'])->name('delete');
            // Route::get('filter/{time}', [EventBookingController::class, 'filter'])->name('filter');
        });


        // News
        Route::group(['prefix' => 'news', 'as' => 'news#'], function () {
            Route::get('page', [NewsController::class, 'index'])->name('page');
            Route::get('create-page', [NewsController::class, 'createPage'])->name('createPage');
            Route::post('create', [NewsController::class, 'create'])->name('create');
            Route::get('detail/{id}', [NewsController::class, 'detailPage'])->name('detailPage');
            Route::get('edit-page/{id}', [NewsController::class, 'edit'])->name('editPage');
            Route::post('update/{id}', [NewsController::class, 'update'])->name('update');
            Route::get('delete/{id}', [NewsController::class, 'delete'])->name('delete');
        });


        // Contact
        Route::group(['prefix' => 'contact', 'as' => 'contact#'], function () {
            Route::get('page', [ContactController::class, 'index'])->name('page');
            Route::get('detail/{id}', [ContactController::class, 'detailPage'])->name('detailPage');
            Route::get('delete/{id}', [ContactController::class, 'delete'])->name('delete');
        });


        // Newsletter
        Route::group(['prefix' => 'newsletter', 'as' => 'newsletter#'], function () {
            Route::get('page', [NewsletterController::class, 'index'])->name('page');
        });


        Route::get('categories/{category}', function ($category) {
            return response()->json($category->category_id);
        });
    });
});

// user
Route::middleware('user_auth')->group(function () {

    Route::group(['prefix' => 'goldeneight', 'as' => 'user#'], function () {
        // home
        Route::group(['prefix' => 'home'], function () {
            Route::get('/page', [UserController::class, 'index'])->name('home');
            // Route::post('/contact', [UserContactController::class, 'contact'])->name('contact');
            Route::post('/newsletter', [UserController::class, 'newsletter'])->name('newsletter');
        });


        // about
        Route::group(['prefix' => 'about'], function () {
            Route::get('/page', [UserController::class, 'about'])->name('about');
            Route::post('/newsletter', [UserController::class, 'newsletter'])->name('newsletter');
        });


        // menu
        Route::group(['prefix' => 'menu'], function () {
            Route::get('/page', [UserController::class, 'menu'])->name('menu');
            Route::post('/newsletter', [UserController::class, 'newsletter'])->name('newsletter');
            Route::get('/filter/{id}', [UserController::class, 'filter'])->name('filter');
            Route::get('/load-more-menus', [UserController::class,'loadMoreMenus'])->name('loadMoreMenus');
        });


        // contact
        Route::group(['prefix' => 'contact'], function () {
            Route::get('/page', [UserContactController::class, 'contactPage'])->name('contactPage');
            Route::post('/contact-form', [UserContactController::class, 'contact'])->name('contact');
            Route::post('/newsletter', [UserController::class, 'newsletter'])->name('newsletter');
        } );


        // reservation
        Route::group(['prefix' => 'reservation'], function () {
            Route::get('/page', [UserReservationController::class, 'reservationPage'])->name('reservationPage');
            Route::post('/reservation-form', [UserReservationController::class, 'reservation'])->name('reservation');
            Route::post('/newsletter', [UserController::class, 'newsletter'])->name('newsletter');
        });


        // event & event-booking
        Route::group(['prefix' => 'events'], function () {
            Route::get('/page', [UserController::class, 'event'])->name('events');
            Route::get('/detail/{id}', [UserController::class, 'eventDetail'])->name('eventDetail');
            Route::post('/event-booking', [UserEventBookingController::class, 'eventBooking'])->name('eventBooking');
            Route::post('/newsletter', [UserController::class, 'newsletter'])->name('newsletter');
            Route::get('/load-more-events', [UserController::class,'loadMoreEvents'])->name('loadMoreEvents');
        });


        // news
        Route::group(['prefix' => 'news'], function () {
            Route::get('/page', [UserController::class, 'news'])->name('news');
            Route::get('/detail/{id}', [UserController::class, 'newsDetail'])->name('newsDetail');
            Route::post('/newsletter', [UserController::class, 'newsletter'])->name('newsletter');
        });

    });
});


require __DIR__.'/auth.php';
