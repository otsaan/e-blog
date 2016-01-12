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


    Route::get('/messages', [
        'as' => 'messages',
        'middleware' => ['auth'],
        'uses'=>'MessageController@index'
    ]);

    Route::get('/messages/sent', [
        'as' => 'sent_messages',
        'middleware' => ['auth'],
        'uses'=>'MessageController@sent'
    ]);

    Route::get('/messages/new', [
        'as' => 'new_message',
        'middleware' => ['auth'],
        'uses'=>'MessageController@create'
    ]);

    Route::post('/messages', [
        'as' => 'post_message',
        'middleware' => ['auth'],
        'uses'=>'MessageController@store'
    ]);

});



Route::get('*', function() {
    return view('errors.404');
});