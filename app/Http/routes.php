<?php

use App\Blog;
use App\User;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'web'], function () {


    Route::get('/', 'HomeController@index');


    Route::get('/404', [
        'as' => '404',
        'uses' => 'HomeController@notFound'
    ]);

    //=============== API routes ===============
    Route::get('/api/users', 'HomeController@getUsers');
    Route::get('/api/article/{id}', 'ArticleController@get');

    //=============== User routes ===============
    Route::post('/articles', 'ArticleController@update');
    Route::delete('/articles/{id}', 'ArticleController@destroy');

    Route::auth();

    //=============== Crazy workaround ===============
    Route::get('/dashboard', [
        'as' => 'root_dashboard',
        'middleware' => ['auth'],
        'uses'=> 'HomeController@dashboard'
    ]);

    //=============== handle registration confirmation ===============
    Route::get('register/verify/{confirmationCode}', [
        'as' => 'confirm',
        'uses' => 'UserController@confirm'
    ]);

    Route::put('/blogs/{id}/activate', [
        'middleware' => ['auth','admin'],
        'as' => 'activate',
        'uses'=>'BlogController@activate'
    ]);

    Route::post('/like/{id}', [
        'middleware' => ['auth'],
        'uses'=>'ArticleController@like'
    ]);

});

Route::group([
    'prefix' => '{username}',
    'middleware' => ['web']], function () {


    //=============== Main dashboard route ===============
    Route::get('/dashboard', [
        'as' => 'dashboard',
        'middleware' => ['auth','username'],
        'uses'=> 'UserController@dashboard'
    ]);


    //=============== User routes ===============
    Route::get('/profile', [
        'as' => 'profile',
        'middleware' => ['auth','username'],
        'uses'=>'UserController@profile'
    ]);

    Route::post('/profile', [
        'middleware' => ['auth','username'],
        'uses'=>'UserController@update'
    ]);

    Route::get('/', [
        'as' => 'blog',
        'middleware' => ['exists','active','incrementBlogViews'],
        'uses' => 'BlogController@index'
    ]);

    Route::get('/disabled', [
        'as' => 'disabled',
        'uses' => 'HomeController@disabled'
    ]);

    Route::get('/articles', [
        'as' => 'articles',
        'middleware' => ['auth','username'],
        'uses'=>'ArticleController@index'
    ]);

    Route::post('/articles', [
        'middleware' => ['auth','username'],
        'uses'=>'ArticleController@create'
    ]);

    Route::get('/post/{id}', [
        'as' => 'article',
        'middleware' => ['exists','active'],
        'uses'=>'ArticleController@show'
    ]);

    Route::get('/contact', [
        'as' => 'contact_me',
        'middleware' => ['exists','active'],
        'uses'=>'BlogController@contact'
    ]);

    Route::post('/contact', [
        'as' => 'mail_me',
        'middleware' => ['exists'],
        'uses'=>'BlogController@sendEmail'
    ]);


    //=============== Admin routes ===============
    Route::get('/categories', [
        'as' => 'categories',
        'middleware' => ['auth','username','admin'],
        'uses'=>'CategoryController@index'
    ]);

    Route::post('/categories', [
        'middleware' => ['auth','username','admin'],
        'uses'=>'CategoryController@create'
    ]);

    Route::put('/categories/{id}', [
        'middleware' => ['auth','username','admin'],
        'uses'=>'CategoryController@update'
    ]);

    Route::get('/blogs', [
        'as' => 'blogs',
        'middleware' => ['auth','username','admin'],
        'uses'=>'BlogController@blogs'
    ]);

    Route::get('/blogs/{id}/articles', [
        'as' => 'articles-blog',
        'uses'=>'BlogController@articles'
    ]);

    Route::get('/statistics', [
        'as' => 'statistics',
        'middleware' => ['auth','username','admin'],
        'uses'=>'AdminController@statistics'
    ]);
    
    Route::get('/initiate', [
        'as' => 'initiate',
        'middleware' => ['auth','username','admin'],
        'uses'=>'AdminController@initiate'
    ]);

    Route::post('/initiate', [
        'as' => 'import_csv',
        'middleware' => ['auth','username','admin'],
        'uses'=>'AdminController@importCsv'
    ]);

    //=============== Messages routes ===============
    require('messages-routes.php');
});


Route::get('*', function() {
    return view('errors.404');
});