<?php

use Illuminate\Http\Request;

Route::prefix('v1')->group(function () {

    Route::post('/register', 'UserController@register');
    Route::post('/login', 'UserController@login');
    Route::post('/logout', 'UserController@logout');
});

