<?php

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/admin', function () {
    return view('admin.index');
});


Route::group(['domain' => '{username}.localhost', 'middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('blog');
    });


    Route::get('/dashboard', ['middleware' => 'auth', function () {
        return view('index');
    }]);
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();
});

Route::get('/', function() {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});