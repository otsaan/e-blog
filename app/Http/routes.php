<?php

use App\Blog;
use App\User;
use Illuminate\Support\Facades\Auth;


Route::group([
    'domain' => '{username}.localhost',
    'middleware' => ['web','usernameExists']], function () {

    Route::get('/dashboard', [
        'as' => 'dashboard',
        'middleware' => ['auth','usernameCheck'],
        'uses'=> 'UserController@dashboard'
    ]);

    Route::get('/profile', [
        'as' => 'profile',
        'middleware' => ['auth','usernameCheck'],
        'uses'=>'UserController@index'
    ]);

    Route::get('/', [
        'as' => 'blog',
        'uses' => 'BlogController@index'
    ]);

    // Domain auth routes
    Route::get('/login', 'Auth\AuthController@login');
    Route::post('/login', 'Auth\AuthController@login');

    Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'Auth\PasswordController@reset');
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');

    Route::get('/logout', 'Auth\AuthController@logout');

});


Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'HomeController@index');

    Route::get('/register', 'Auth\AuthController@showRegistrationForm');
    Route::post('/register', 'Auth\AuthController@register');

//    Route::get('/create', function(){
//        return view('auth.register');
//    });
});


Route::get('*', function() {
    return view('errors.404');
});