<?php

use Illuminate\Http\Request;


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('/users', 'UserController@index');
Route::post('/user/{user}', 'UserController@store');
Route::get('/sports', 'SportController@index');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
