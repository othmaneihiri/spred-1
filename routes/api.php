<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Auth
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::get('user', 'AuthController@getAuthUser');

// Category
Route::apiResource('categories', 'CategoryController');
Route::get('newsbycategories/{category}','CategoryController@getNewsInCategory');

// News
//Route::post('categories/{category}/news', 'NewsController@store')->middleware('auth:api');
//Route::get('categories/{category}/news', 'CategoryController@getNewsInCategory');

