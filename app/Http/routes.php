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

    Route::get('/404', function(){
        return view('errors.404');
    });

});



Route::group(['middleware' => 'web'], function () {

});


Route::get('*', function() {
    return view('errors.404');
});