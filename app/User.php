<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Utils\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    // use Uuids;
    use SoftDeletes;

    // public $incrementing = false;
    /**
     * models default values
    * 
    * @var array
    */
    protected $attributes = [
        'role' => 'user',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'email_verified_at',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return ['role' => $this->role,'email' => $this->email];
    }

    /**
     * return all tickets created by the user
     */
    public function tickets() {
        return $this->hasMany('App\Models\Ticket', 'user','id');
    }
}
