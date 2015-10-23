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

// Index
Route::get('/', 'IndexController@index');

// プロフィール
Route::get('/profile_view', 'ProfileController@view');
Route::get('/profile_edit', 'ProfileController@edit');
