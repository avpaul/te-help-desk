<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\User;
use App\Models\Ticket;
use App\Models\Conversation;

class TicketController extends Controller
{   
    private $ticket;

    public function __construct(Ticket $ticket) 
    {
        $this->middleware('auth');
        $this->ticket = $ticket;
    }

    /**
     * get all tickets
     */
    public function store(Request $request) 
    {   
        $token = $request->cookie('token');
        JWTAuth::setToken($token);
        $user = JWTAuth::payload();

        try {
            $request->validate([
                'ticketTitle' => 'required|min:10|max:165',
                'ticketContent' => 'required|min:10',
            ]);

            $this->ticket->user  = $user['sub'];
            $this->ticket->title = $request->ticketTitle;
            $this->ticket->status = 'pending';
            $this->ticket->save();
            // create the first conversation 
            $this->ticket->addConversation($this->ticket->id,$user['sub'],$request->ticketContent);
            return response()->redirectTo('/');
        } catch (\Throwable $error) {
            // echo $error;
            $errors = $error->getMessages();
            if ($errors) {
                $errorMessage = array_key_first($errors);
                return \response()->withError($errorMessage); 
            }

            return \response()->withError();
        }
    }


    /**
     * get all tickets
     */
    public function show(Request $request, $id) 
    {
        $token = $request->cookie('token');
        JWTAuth::setToken($token);
        $user = JWTAuth::payload();

        try {
            if($user['role'] === 'user')
            {
                $userId = $user['sub'];
                // get all user tickets
                $userTickets = Ticket::where('user',$userId)->orderBy('updated_at')->with(['conversations' => function ($query) {
                        $query->orderBy('created_at','desc')->first();
                    }
                ])->get();
                // get main ticket
                $mainTicket = Ticket::where([['id','=',$id],['user', '=', $userId]])->with(['conversations' => function ($query)
                {
                    $query->orderBy('updated_at','asc');
                }])->first();
                return view('ticket',['tickets' => $userTickets, 'mainTicket' => $mainTicket]);
            } 
            else if($user['role'] === 'support')  
            {
                $userTickets = Ticket::with(['conversations' => function ($query) {
                    $query->orderBy('created_at','desc')->first();
                }
                ])->get();
                $mainTicket = Ticket::where([['id','=',$id]])->with(['conversations' => function ($query)
                {
                    $query->orderBy('updated_at','asc')->with('owner:id,role,email');
                }])->first();
                if($mainTicket->status === 'pending'){
                    $mainTicket->status = 'active';
                    $mainTicket->save();
                }
                return view('ticket',['tickets' => $userTickets, 'mainTicket' => $mainTicket]);
            }
        } catch (\Throwable $error) {
            echo $error;
        }
    }

    /**
     * get all tickets
     */
    public function update(Request $request, $id) 
    {
        try {
            $token = $request->cookie('token');
            JWTAuth::setToken($token);
            $user = JWTAuth::payload();
            $request->validate([
                'status' => 'required'
            ]);
            if($user['role'] === 'user')
            {
                $userId = $user['sub'];
                $ticket = Ticket::where([['id', '=', $id], ['user', '=', $userId]])->first();
                if (isset($ticket)) {
                    $ticket->status = $request->status;
                    $ticket->save();
                    if($request->status === 'active')
                    {
                        return redirect('/tickets/'.$id);
                    }
                    return redirect('/');
                } else {
                    return redirect('/tickets/'.$id);
                }
            }
        } catch (\Throwable $error) {
            echo $error;
        }
    }

    /**
     * delete a ticket
     */
    public function destroy(Request $request, $id) 
    {
        try {
            $token = $request->cookie('token');
            JWTAuth::setToken($token);
            $user = JWTAuth::payload();
            if($user['role'] === 'user')
            {
                $userId = $user['sub'];
                $ticket = Ticket::where([['id', '=', $id], ['user', '=', $userId]])->first();
                if (isset($ticket)) {
                    $ticket->status = 'closed';
                    $ticket->save();
                    $ticket->delete();
                    return redirect('/');
                } else {
                    return redirect('/tickets/'.$id);
                }
            }
        } catch (\Throwable $error) {
            echo $error;
        }

    }
}
