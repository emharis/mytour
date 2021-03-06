<?php

Route::get('/', function() {
    return Redirect::to('front/home');
});

Route::group(array('prefix' => 'front'), function() {
    Route::controller('home', 'App\Controllers\Front\HomeController');
    Route::controller('about', 'App\Controllers\Front\AboutController');
    Route::controller('blog', 'App\Controllers\Front\BlogController');
    Route::controller('search', 'App\Controllers\Front\SearchController');
    Route::controller('dest', 'App\Controllers\Front\DestinasiController');
    Route::controller('foto', 'App\Controllers\Front\FotoController');
    Route::controller('video', 'App\Controllers\Front\VideoController');
    Route::controller('travel', 'App\Controllers\Front\TravelController');
    Route::controller('hotel', 'App\Controllers\Front\HotelController');
    Route::controller('rent', 'App\Controllers\Front\RentController');
    //Route::controller('contact', 'App\Controllers\Front\ContactController');
    //Route::controller('book', 'App\Controllers\Front\BookController');
});

Route::group(array('prefix' => 'admin'), function() {
    Route::any('/', function() {
        return \Redirect::to('admin/login');
    });
    Route::get('logout', function() {
        return \Redirect::to('admin/login/logout');
    });
    Route::controller('login', 'App\Controllers\Admin\LoginController');
    Route::controller('home', 'App\Controllers\Admin\HomeController');
    Route::controller('message', 'App\Controllers\Admin\MessageController');
    Route::controller('testimoni', 'App\Controllers\Admin\TestimoniController');
    Route::group(array('prefix' => 'page'), function() {
        Route::controller('homepage', 'App\Controllers\Admin\HomepageController');
        Route::controller('about', 'App\Controllers\Admin\AboutpageController');
        Route::controller('blog', 'App\Controllers\Admin\BlogController');
        Route::controller('foto', 'App\Controllers\Admin\FotoController');
        Route::controller('video', 'App\Controllers\Admin\VideoController');
        Route::controller('contact', 'App\Controllers\Admin\ContactController');
        Route::controller('destinasi', 'App\Controllers\Admin\DestinasiController');
    });
    Route::group(array('prefix' => 'paket'), function() {
        Route::controller('hotel', 'App\Controllers\Admin\HotelController');
        Route::controller('travel', 'App\Controllers\Admin\TravelController');
        Route::controller('rental', 'App\Controllers\Admin\RentalController');
    });
});