<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


Route::group(['domain' => '{username}.localhost', 'middleware' => ['web']], function () {

    Route::get('/dashboard', ['as' => 'dashboard', 'middleware' => [], function ($username) {
        if ($username == 'admin') {
            return redirect('/admin');
        }

        if (User::where('username', '=', $username)->count() == 0) {
            return view('errors.404');
        }

        return view('index');
    }]);

    Route::get('/profile', ['as' => 'profile', 'middleware' => ['auth','usernameCheck'], function ($username) {
        if (User::where('username', '=', $username)->count() == 0) {
            return view('errors.404');
        }

        return view('profile');
    }]);

    Route::get('/', ['as' => 'blog', function ($username) {

        if (User::where('username', '=', $username)->count() == 0) {
            return view('errors.404');
        }

        if ($username == 'admin' && auth()->user()->role == 'admin') {
            return redirect('/admin');
        }

        if ($username == 'admin' && auth()->user()->role == 'student') {
            return view('errors.404');
        }

        return view('blog');
    }]);

    Route::get('/admin', ['middleware' => ['auth', 'admin'], function () {
        return view('admin.index');
    }]);

    Route::auth();
});



Route::group(['middleware' => 'web'], function () {

    Route::get('/', ['uses' => 'HomeController@index', 'as'=> 'home']);

//    Route::get('/welcome', function () {
//        return redirect()->route('dashboard', Auth::user()->username);
//    });

    Route::get('/user', function(){
        return auth()->user();
    });

});



Route::get('*', function() {
    return view('errors.404');
});