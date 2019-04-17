<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::get('login', 'UserController@login');
Route::post('login', 'UserController@login');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function(){

    Route::get('/', function () {
        return view('dashboard.pages.index');
    });

    /*
    |--------------------------------------------------------------------------
    | POST
    |--------------------------------------------------------------------------
    */
    Route::get('post', 'PostController@index');
    Route::post('post', 'PostController@index');
    Route::get('post/create/', 'PostController@create');
    Route::post('post/create/', 'PostController@create');
    Route::get('post/update/{id}', 'PostController@update');
    Route::post('post/update/{id}', 'PostController@update');
    Route::get('post/delete/{id}', 'PostController@destroy');

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    Route::get('logout', 'UserController@logout');
});
