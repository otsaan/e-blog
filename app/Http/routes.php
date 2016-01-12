<?php

use App\Blog;
use App\User;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'HomeController@index');
    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('/api/article/{id}', 'ArticleController@get');

    Route::post('/articles', 'ArticleController@update');
    Route::delete('/articles/{id}', 'ArticleController@destroy');

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

    Route::post('/profile', [
        'middleware' => ['auth'],
        'uses'=>'UserController@update'
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

    Route::get('/blog', [
        'as' => 'blog-articles',
        'uses'=>'ArticleController@blog'
    ]);

    Route::get('/blog/{id}', [
        'as' => 'article',
        'uses'=>'ArticleController@show'
    ]);

    Route::get('/contact', [
        'as' => 'contact',
        'uses'=>'ArticleController@contact'
    ]);

    Route::post('/mail', [
        'as' => 'mail',
        'uses'=>'UserController@sendEmail'
    ]);

});



Route::get('*', function() {
    return view('errors.404');
});