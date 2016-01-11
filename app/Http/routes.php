<?php

use App\Blog;
use App\User;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'HomeController@index');
    Route::get('/dashboard', 'HomeController@dashboard');

    Route::auth();
});

Route::group([
    'prefix' => '{username}',
    'middleware' => ['web']], function () {

    Route::get('/dashboard', [
        'as' => 'dashboard',
        'middleware' => ['auth'],
        'uses'=> 'UserController@dashboard'
    ]);

    Route::get('/profile', [
        'as' => 'profile',
        'middleware' => ['auth'],
        'uses'=>'UserController@profile'
    ]);

    Route::get('/', [
        'as' => 'blog',
        'uses' => 'BlogController@index'
    ]);

    Route::get('/articles', [
        'as' => 'articles',
        'middleware' => ['auth'],
        'uses'=>'ArticleController@index'
    ]);

    Route::post('/articles', [
        'middleware' => ['auth'],
        'uses'=>'ArticleController@create'
    ]);

});



Route::get('*', function() {
    return view('errors.404');
});