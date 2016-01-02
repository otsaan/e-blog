<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/profile', function () {
    return view('profile');
});



Route::group(['domain' => '{username}.localhost', 'middleware' => ['web']], function () {

    Route::get('/', function ($username) {
        if ($username == 'admin') {
            return view('admin.index');
        }
        return view('blog');
    });


    Route::group(['middleware' => 'auth'], function () {

        Route::get('/dashboard', function ($username) {
            if ($username != 'admin') {
                return view('index');
            }
        });
    });


    Route::get('/login', function () {
        return view('login');
    });

    Route::get('/register', function () {
        return view('register');
    });
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});
