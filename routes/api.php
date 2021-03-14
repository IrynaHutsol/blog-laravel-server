<?php
use Illuminate\Http\Request;


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/signup', 'AuthController@signup');  
    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('/logout', 'AuthController@logout');
        Route::get('/user', 'AuthController@user');
        Route::post('/posts', 'PostController@create');
        Route::post('/comments', 'CommentController@create');
    });
});

Route::get('/posts', 'PostController@getPosts');
Route::get('/posts/{id}', 'PostController@show');

Route::get('/comments', 'CommentController@getComments');