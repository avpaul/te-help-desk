<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Utils\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{   
    // use Uuids;
    use SoftDeletes;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    // public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user','ticket','content'];

    /**
     * explicit type cast
     * 
     * @var array
     */
    //  protected $casts = [
    //      'user_id' => 'uuid',
    //      'ticket_id' => 'uuid',
    //  ];
    
    /**
     * return the user
     */
    public function owner() {
        return $this->belongsTo('App\User','user','id');
    }

    /**
     * return the ticket
     */
    public function ticket() {
        return $this->belongsTo('App\Models\Ticket','ticket','id');
    }
}
