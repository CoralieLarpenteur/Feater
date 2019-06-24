<?php

use Illuminate\Http\Request;

Route::get('/users', 'UserController@index');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
