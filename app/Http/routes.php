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



Route::group(['middleware' => ['web']], function () {
    //
});


Route::group(['domain' => '{username}.localhost'], function () {
    Route::get('/', function ($username) {
        if ($username == 'admin') {
            return view('admin.index');
        }

        return view('index');
    });
});