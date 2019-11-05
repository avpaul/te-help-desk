<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\User;
use App\Models\Ticket;
use App\Models\Conversation;

class HomeController extends Controller
{   
    private $redirectTo = '/login';
    private $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $token = $request->cookie('token');
        JWTAuth::setToken($token);
        $user = JWTAuth::payload();

        if($user['role'] === 'user'){
            $userId = $user['sub'];
            $userTickets = Ticket::where('user',$userId)->orderBy('updated_at')->with(['conversations' => function ($query) {
               $query->orderBy('created_at','desc')->take(-1);
            }
            ])->get();
            $userTickets->map(function ($ticketItem)
            {
                $ticketItem->conversationsCount = Conversation::where('ticket','=',$ticketItem->id)->count();
            });
            return view('user',['tickets' => $userTickets, 'title' => 'Helpdesk']);
        } else if($user['role'] === 'support' || $user['role'] === 'admin') {
            $allTickets = Ticket::where('deleted_at', '=', null)->orderBy('updated_at','desc')->with(['owner:id,email', 'conversations' => function($query)
            {
                $query->orderBy('created_at','desc')->take(-1);
            }])->get();
            return view('desk',['tickets' => $allTickets, 'title' => 'Helpdesk']);
        }
    }
}
