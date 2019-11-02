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
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/reset-password', function () {
    return view('reset');
});

Route::get('/verify-email', 'UserController@verifyEmail');

Route::get('/', 'HomeController@index');

Route::get('/tickets','TicketController@index');

Route::get('/tickets/{id}','TicketController@show');

Route::post('/tickets',['as' => 'tickets.post','uses' => 'TicketController@store']);

Route::put('/tickets/{id}',['as' => 'tickets.update','uses' => 'TicketController@update']);

Route::delete('/tickets/{id}',['as'=> 'tickets.destroy', 'uses' => 'TicketController@destroy']);

Route::post('/tickets/{id}/conversations',['as' => 'conversation.post','uses' => 'ConversationController@store']);

Route::get('/mailable', function()
{
    $details = ['link' => 'http://localhost:8000/tickets/4', 'comment' => 'Yes! we\'ve noticed that thing and our engineers are working on it', 'subject' => 'New reply to your ticket!', 'ticket' => 'Helpdesk under heavy usage'];
    return new App\Mail\NewTicketNotification($details);
});