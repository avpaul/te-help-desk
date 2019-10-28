<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Utils\Uuids;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use Uuids;

    public $incrementing = false;
    /**
     * models default values
    * 
    * @var array
    */
    protected $attributes = [
        'role' => 'user',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return ['role' => $this->role,'email' => $this->email];
    }
}
