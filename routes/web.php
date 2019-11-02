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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/signup', function () {
    return view('auth.signup');
});

Route::get('/reset-password', function () {
    return view('auth.reset');
});

Route::get('/verify-email', 'UserController@verifyEmail');

Route::get('/dashboard', 'AdminController@show');

Route::post('/dashboard', ['as' => 'admin.create.user', 'uses' => 'AdminController@createUser']);


Route::get('/', 'HomeController@index');
 
Route::get('/tickets','TicketController@index');

Route::get('/tickets/{id}','TicketController@show');

Route::post('/tickets',['as' => 'tickets.post','uses' => 'TicketController@store']);

Route::put('/tickets/{id}',['as' => 'tickets.update','uses' => 'TicketController@update']);

Route::delete('/tickets/{id}',['as'=> 'tickets.destroy', 'uses' => 'TicketController@destroy']);

Route::post('/tickets/{id}/conversations',['as' => 'conversation.post','uses' => 'ConversationController@store']);
