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

    Route::auth();

});


Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'HomeController@index');

    Route::post('/register', 'HomeController@index');

    Route::get('/create', function(){
        return view('auth.register');
    });
});


Route::get('*', function() {
    return view('errors.404');
});