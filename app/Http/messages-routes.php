<?php

Route::get('/messages', [
    'as' => 'messages',
    'middleware' => ['auth','username'],
    'uses'=>'MessageController@index'
]);

Route::get('/messages/sent', [
    'as' => 'sent_messages',
    'middleware' => ['auth','username'],
    'uses'=>'MessageController@sent'
]);

Route::get('/messages/sent/{id}', [
    'as' => 'show_sent_messages',
    'middleware' => ['auth','username'],
    'uses'=>'MessageController@showSent'
]);

Route::get('/messages/new', [
    'as' => 'new_message',
    'middleware' => ['auth','username'],
    'uses'=>'MessageController@create'
]);

Route::get('/messages/{id}', [
    'as' => 'show_message',
    'middleware' => ['auth','username','read'],
    'uses'=>'MessageController@show'
]);

Route::post('/messages', [
    'as' => 'post_message',
    'middleware' => ['auth','username'],
    'uses'=>'MessageController@store'
]);

Route::post('/messages/{id}', [
    'as' => 'reply_message',
    'middleware' => ['auth','username'],
    'uses'=>'MessageController@reply'
]);