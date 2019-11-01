<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     * 
     * @var array
     */
    // TODO: what is cookie encryption here?
    protected $except = [
        'token',
        'XSRF-TOKEN',
        'laravel_session'
    ];
}
