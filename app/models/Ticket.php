<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Utils\Uuids;
use App\Models\Conversation;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
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
    protected $fillable = ['user','title','status'];

    /**
     * explicit type cast
     * 
     * @var array
     */
    // protected $casts = [
    //     'user_id' => 'uuid',
    // ];

    /**
     * return all conversations on this ticket
     */
    public function conversations() 
    {
        return $this->hasMany('App\Models\Conversation','ticket','id');
    }

    /**
     * return the user who created this ticket
     */
    public function owner(){
        return $this->belongsTo('App\User','user','id');
    }

    /**
     * add a conversation to this ticket
     */

     public function addConversation($ticket, $user, $content) 
     {
        $conversation = Conversation::create(['user' => $user, 'ticket' => $ticket, 'content' => $content]);
        return $conversation;
     }

     /**
      * return count of all conversations on this ticket
      */
      public function count()
      {
        $this->count = Conversation::where('ticket',$this->id)->count()->get();
      }
}
