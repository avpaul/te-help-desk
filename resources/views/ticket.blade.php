<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Help Desk</title>
        
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"
        />
        <link
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&display=swap"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
        />
        <link rel="stylesheet" href="/css/app.css" />
    </head>
    <body>
        <div id="app" class="user-pages user-pages-ticket">
            <nav class="transparent z-depth-0">
                <div class="nav-wrapper ">
                    <a href="/" class="brand-logo text-primary "
                        >HELP DESK</a
                    >
                    <div class="nav-actions right">
                    <div class="user-profile" title="{{getUser()->email}}">
                        @if (getUser()->role === 'user')
                        <!-- <img
                            src="/user-96.png"
                            alt="{{getUser()->email}}"
                        />  -->
                        <div class="user-initials">{{getUserInitials(getUser()->email)}}</div>
                        @else
                        <div class="user-initials">sp</div>
                        @endif
                    </div>
                    <button class="btn btn-flat btn-logout">
                    <i class="zmdi zmdi-lock-outline"></i>&nbsp;
                        Logout </button>
                </div>
                </div>
            </nav>

            <div class="row content-wrapper">
                <div class="col s3  user-tickets-wrapper">
                    <div class="user-tickets-header">
                        @if (getUser()->role === 'support')
                        <h6 class="title">All Tickets <span>({{ count($tickets) }})</span></h6>
                        @else
                        <h6 class="title">Your Tickets <span>({{ count($tickets) }})</span></h6>
                        @endif
                    </div>

                    <div class="user-ticket-group">
                        @foreach ($tickets as $ticket)
                        <a class="user-ticket-snap {{($ticket->id === $mainTicket->id ? 'active' : '')}}" href="/tickets/{{$ticket->id}}">
                            <div class="title">{{$ticket->title}}</div>
                            <div class="user-ticket-snap-footer">
                                <div class="time">{{formatDate($ticket->created_at)}}</div>
                                <div class="status {{$ticket->status}}"></div>
                            </div>
                        </a>
                        @endforeach

                    </div>
                </div>
                <div class="col s8 user-single-ticket-wrapper">
                    <div class="user-single-ticket">
                        <div class="user-ticket-header">
                            <h5 class="title">{{$mainTicket->title}}</h5>
                            <div class="ticket-meta">
                                <div class="ticket-date">{{formatDate($mainTicket->created_at)}}</div>
                                <div class="ticket-conversations-count">
                                    <i class="zmdi zmdi-comments"></i
                                    >&nbsp;<span>{{count($mainTicket->conversations)}}</span>
                                </div>
                                <div class="ticket-status {{$mainTicket->status}}">{{$mainTicket->status}}</div>
                            </div>
                        </div>
                        <div class="user-ticket-conversations-shadow-top"></div>
                        <div class="user-ticket-conversations">
                            @foreach ($mainTicket->conversations as $conversation)
                            <div class="user-ticket-conversation {{$conversation->owner->id === getUser()->id ? 'current-user' : ''}}">
                                <div class="conversation-owner" title="{{$conversation->owner->email}}">
                                    @if ($conversation->owner->role === 'user')
                                    <!-- <img
                                        src="/user-96.png"
                                        alt="user"
                                    />  -->
                                    <div class="user-initials">{{getUserInitials($conversation->owner->email)}}</div>
                                    @else
                                    <div class="user-initials">sp</div>
                                    @endif
                                </div>
                                <div class="conversation-content">
                                    {{$conversation->content}}
                                </div>
                            </div>
                            @endforeach

                            

                            <!-- <div class="user-ticket-conversation desk">
                                <div class="conversation-owner">
                                    <div class="user-initials" title="HelpDesk">
                                        hd
                                    </div>
                                </div>
                                <div class="conversation-content">
                                    I'm having an issue with the settings, they
                                    are not working as expected. I'm double
                                    checking the values but they are not the
                                    same.
                                </div>
                            </div> -->
                        </div>

                        <div class="ticket-footer">
                            @if ((getUser()->role === 'user' || getUser()->role === 'admin') && $mainTicket->status !== 'closed')
                            <button
                                class="btn btn-flat btn-close waves-effect waves-light"
                                title="Close Ticket"
                                onclick="document.forms['closeTicket'].submit()"
                            >
                                <i class="zmdi zmdi-close-circle"></i
                                >&nbsp;&nbsp;<span>close</span>
                            </button>
                            <form action="{{route('tickets.update',['id' => $mainTicket->id])}}" method="POST" name="closeTicket" hidden>
                                @csrf
                                @method('PUT')
                                <input type="text" name="status" value="closed">
                            </form>
                            @endif

                            <!-- <button class="btn btn-flat waves-effect">
                                        <i
                                            class="zmdi zmdi-check-circle text-primary"
                                        ></i
                                        >&nbsp;&nbsp;<span>re-open</span>
                                    </button> -->
                            <button
                                class="btn btn-flat btn-reply waves-effect waves-light"
                                title="Reply Ticket"
                            >
                                <i class="zmdi zmdi-mail-send"></i
                                >&nbsp;&nbsp;<span>reply</span>
                            </button>

                            <!-- <button class="btn btn-flat btn-delete waves-effect" title="Close and Delete Ticket">
                                        <i
                                            class="zmdi zmdi-delete text-danger"
                                        ></i
                                        >&nbsp;&nbsp;<span>delete</span>
                                    </button> -->
                        </div>

                        <form class="ticket-reply" action="{{route('conversation.post',['id' => $mainTicket->id])}}" method="POST">
                            @csrf
                            <textarea
                                class="ticket-reply-editor"
                                placeholder="Your reply here..."
                                name="content"
                            ></textarea>
                            <div class="ticket-reply-footer">
                                <button
                                    class="btn btn-flat btn-delete waves-effect"
                                    title="Cancel Reply"
                                    type="reset"
                                >
                                    <i class="zmdi zmdi-close-circle"></i
                                    >&nbsp;&nbsp;<span>cancel</span>
                                </button>
                                <button
                                    class="btn btn-flat waves-effect"
                                    title="Send Reply"
                                    type="submit"
                                >
                                    <i
                                        class="zmdi zmdi-mail-send text-primary"
                                    ></i
                                    >&nbsp;&nbsp;<span>send</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <footer>
                <p class="center-align grey-text">&copy; 2019 TECHENFOLD</p>
            </footer>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
