<?php

use Illuminate\Http\Request;


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('/users', 'UserController@index');
Route::get('/sports', 'SportController@index');
Route::get('/restaurants', 'RestaurantController@index');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
