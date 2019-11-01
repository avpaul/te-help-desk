<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\User;
use App\Models\Ticket;
use App\Models\Conversation;

class ConversationController extends Controller
{   
    protected $conversation;

    public function __construct(Conversation $conversation) 
    {
        $this->middleware('auth');
        $this->conversation = $conversation;
    }

    /**
     * get all tickets
     */
    public function store(Request $request, $id) 
    {   
        $token = $request->cookie('token');
        JWTAuth::setToken($token);
        $user = JWTAuth::user();

        try {
            $request->validate([
                'content' => 'required|string|min:1',
            ]);

            $this->conversation->user  = $user->id;
            $this->conversation->ticket = $id;
            $this->conversation->content = $request->content;
            $this->conversation->save();
            
            $ticket = $this->conversation->ticket()->first();
            $ticket->updated_at = now();
            if($user->role === 'user'){
                if($ticket->status === 'closed')
                {
                    $ticket->status = 'active';
                }
            }
            $ticket->save();

            // create the first conversation 
            return response()->redirectTo('/tickets/'.$id);
        } catch (\Throwable $error) {
            echo $error;
            // $errors = $error->getMessages();
            // if ($errors) {
            //     $errorMessage = array_key_first($errors);
            //     return \response()->withError($errorMessage); 
            // }

            // return \response()->withError();
        }
    }

}