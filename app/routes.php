<?php

Route::get('/', function() {
    return Redirect::to('front/home');
});

Route::group(array('prefix' => 'front'), function() {
    Route::controller('home', 'App\Controllers\Front\HomeController');
    Route::controller('about', 'App\Controllers\Front\AboutController');
    //Route::controller('travinfo', 'App\Controllers\Front\TravinfoController');
    //Route::controller('foto', 'App\Controllers\Front\FotoController');
    //Route::controller('video', 'App\Controllers\Front\VideoController');
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
    Route::group(array('prefix' => 'page'), function() {
        Route::controller('homepage', 'App\Controllers\Admin\HomepageController');
        Route::controller('about', 'App\Controllers\Admin\AboutpageController');
        Route::controller('blog', 'App\Controllers\Admin\BlogController');
        Route::controller('foto', 'App\Controllers\Admin\FotoController');
        Route::controller('video', 'App\Controllers\Admin\VideoController');
        Route::controller('contact', 'App\Controllers\Admin\ContactController');
    });
    Route::group(array('prefix' => 'paket'), function() {
        Route::controller('hotel', 'App\Controllers\Admin\HotelController');
        Route::controller('travel', 'App\Controllers\Admin\TravelController');
        Route::controller('rental', 'App\Controllers\Admin\RentalController');
    });
});

// /*
  // |--------------------------------------------------------------------------
  // | Application Routes
  // |--------------------------------------------------------------------------
  // |
  // | Here is where you can register all of the routes for an application.
  // | It's a breeze. Simply tell Laravel the URIs it should respond to
  // | and give it the Closure to execute when that URI is requested.
  // |
 // */

// Route::get('/', function() {
    // return Redirect::to('front/home');
// });

// Route::group(array('prefix' => 'front'), function() {
    // Route::any('/', function() {
        // return Redirect::to('front/home');
    // });

    // Route::controller('home', 'App\Controllers\Front\HomeController');
    // Route::controller('login', 'App\Controllers\Front\LoginController');
    // Route::controller('user', 'App\Controllers\Front\UserController');
    // Route::controller('statpage', 'App\Controllers\Front\StatpageController');
    // Route::controller('blog', 'App\Controllers\Front\BlogController');
    // Route::controller('contact', 'App\Controllers\Front\ContactController');
    // Route::controller('destination', 'App\Controllers\Front\DestinationController');
    // Route::controller('testimoni', 'App\Controllers\Front\TestimoniController');
    // Route::group(array('prefix' => 'gallery'), function() {
        // Route::controller('photo', 'App\Controllers\Front\PhotoController');
        // Route::controller('video', 'App\Controllers\Front\VideoController');
    // });
// });


// Route::group(array('prefix' => 'admin'), function() {
    // Route::any('/', function() {
        // return \Redirect::to('admin/home');
    // })->before('auth');
// //    Route::controller('log', 'App\Controllers\Admin\LogController');

    // /**
     // * LOGIN LOGOUT PROSEDUR
     // */
    // Route::get('login', function() {
        // return \View::make('admin.log.login');
    // })->before('guest');

    // Route::post('login', function() {
        // $creds = array(
            // 'username' => \Input::get('username'),
            // 'password' => \Input::get('password')
        // );

        // try {
            // \Illuminate\Support\Facades\Auth::attempt($creds);

            // //set user log session
            // $user = \Toddish\Verify\Models\User::where('username', \Input::get('username'))->first();
            // //set user to session
            // \Session::put('loguser', $user);
            // \Session::put('onuser_id', $user->id);
            // \Session::put('onusername', $user->username);
            // \Session::put('islogin', true);

            // return \Redirect::to('admin/home');
        // } catch (\Exception $e) {

            // if (\Request::ajax()) {
                // return 'loginerror';
            // } else {
                // Return \Redirect::to('admin/login')->withErrors('loginerror');  //->with('login_errors',true);
            // }
        // }
    // });

    // Route::get('logout', function() {
        // \Illuminate\Support\Facades\Auth::logout();
        // \Session::flush();
        // return \Redirect::to('admin/login');
    // })->before('auth');
    // /**
     // * END OF LOGIN & LOGOUT PROSEDUR
     // */
    // Route::group(array('before' => 'auth'), function() {
        // Route::controller('home', 'App\Controllers\Admin\HomeController');
        // Route::controller('user', 'App\Controllers\Admin\UserController');
        // Route::controller('homepage', 'App\Controllers\Admin\HomepageController');
        // Route::controller('contactpage', 'App\Controllers\Admin\ContactpageController');
        // Route::group(array('prefix' => 'blogs'), function() {
            // Route::controller('kategori', 'App\Controllers\Admin\KategoriController');
            // Route::controller('artikel', 'App\Controllers\Admin\ArtikelController');
        // });
        // Route::group(array('prefix' => 'gallery'), function() {
            // Route::controller('photo', 'App\Controllers\Admin\PhotoController');
            // Route::controller('video', 'App\Controllers\Admin\VideoController');
        // });
        // Route::group(array('prefix' => 'paket'), function() {
            // Route::controller('travpack', 'App\Controllers\Admin\TravpackController');
            // Route::controller('travpackcat', 'App\Controllers\Admin\TravpackcatController');
            // Route::controller('hotel', 'App\Controllers\Admin\HotelController');
            // Route::controller('car', 'App\Controllers\Admin\CarController');
        // });
        // Route::controller('statpage', 'App\Controllers\Admin\StatpageController');
        // Route::controller('menu', 'App\Controllers\Admin\MenuController');
        // Route::controller('testimoni', 'App\Controllers\Admin\TestimoniController');
        // Route::controller('destkat', 'App\Controllers\Admin\DestkatController');
        // Route::controller('destination', 'App\Controllers\Admin\DestinationController');
        // Route::controller('setting', 'App\Controllers\Admin\SettingController');
        // Route::controller('comment', 'App\Controllers\Admin\CommentController');
    // });
// });


// /**
 // * Untuk testing hal hal yang gak penting
 // */
// Route::controller('test', 'App\Controllers\TestController');

// // =============================================
// // CATCH ALL ROUTE =============================
// // =============================================
// // all routes that are not home or api will be redirected to the frontend
// // this allows angular to route them
// if (Request::is('admin*')) {
    // App::missing(function($exception) {
        // return View::make('admin.404');
    // });
// } else {
    // App::missing(function($exception) {
        // return View::make('front.404');
    // });
// }

 