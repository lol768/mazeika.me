<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/admin', [
    'middleware' => 'auth.admin', 'uses' => 'AdminController@index'
]);

Route::group(['prefix' => 'post'], function()
{
    Route::post('new', [
        'as' => 'newPost', 'uses' => 'PostController@newPost'
    ]);
    Route::get('{slug}', [
        'as' => 'showPost', 'uses' => 'PostController@showPost'
    ]);
});

Route::group(['prefix' => 'subscription'], function()
{
    Route::get('subscribe', [
        'as' => 'subscribe', 'uses' => 'SubscriptionController@subscribe'
    ]);
    Route::get('confirm', [
        'as' => 'confirm', 'uses' => 'SubscriptionController@confirm'
    ]);
    Route::get('unsubscribe', [
        'as' => 'unsubscribe', 'uses' => 'SubscriptionController@unsubscribe'
    ]);
});