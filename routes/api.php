<?php

use Illuminate\Http\Request;

Route::prefix('v1')->group(function () {

   Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    });

    Route::post('/register', 'UserController@register');
    Route::post('/login', 'UserController@login');
});

