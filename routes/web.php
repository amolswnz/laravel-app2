<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [
    'uses' => 'PostController@getIndex',
    'as' => 'blog.index'
]);

Route::get('/post/{id}', [
    'uses' => 'PostController@getPost',
    'as' => 'blog.post'
]);

Route::get('/post/{id}/like', [
    'uses' => 'PostController@getLikePost',
    'as' => 'blog.post.like'
]);

Route::get('/about', function () {
    return view('other.about');
});

Route::group(['prefix' => 'admin'], function() {

    Route::get('/', [
        'uses' => 'PostController@getAdminIndex',
        'as' => 'admin.index'
    ]);

    Route::get('create', [
        'uses' => 'PostController@getAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::post('create', [
        'uses' => 'PostController@postAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'PostController@getAdminEdit',
        'as' => 'admin.edit'
    ]);

    Route::post('update', [
        'uses' => 'PostController@postAdminUpdate',
        'as' => 'admin.update'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'PostController@postAdminDelete',
        'as' => 'admin.delete'
    ]);
});