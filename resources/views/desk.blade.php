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
        <div id="app" class="desk-pages desk-pages-home">
            <nav class="transparent z-depth-0">
                <div class="nav-wrapper ">
                    <a href="/" class="brand-logo text-primary ">HELP DESK</a>
                    <div class="nav-actions right">
                    <div class="user-profile ">
                        <!-- <img
                            src="/user-96.png"
                            alt="email"
                        /></div> -->
                        <div class="user-initials">sp</div>
                    </div>
                    <button class="btn btn-flat btn-logout">
                    <i class="zmdi zmdi-lock-outline"></i>&nbsp;
                        Logout </button>
                </div>     
                </div>
            </nav>

            <div class="row app-container">
                <!-- <div class="col s3"></div> -->
                <!-- <div class="col s8 "> -->
                    <div class="desk-tickets-wrapper">
                        <div class="desk-tickets-header">
                            <h5 class="title">All Tickets <span>({{count($tickets)}})</span></h5>
                        </div>
                        <div class="ticket-section-header">
                            <div>Not answered</div></div>
                        <section class="pending-tickets">
                            <!-- {{var_dump($tickets[0]->conversations)}} -->
                            @foreach ($tickets as $ticket)
                            <a class="ticket" href="/tickets/{{$ticket->id}}">
                                <div class="ticket-owner">
                                    <!-- <img src="/user-96.png"alt="{{$ticket->owner->email}}"/> -->
                                    <div class="user-initials">{{getUserInitials($ticket->owner->email)}}</div>
                                </div>
                                <div class="ticket-owner-name">{{$ticket->owner->email}}</div>
                                <div class="ticket-title">{{$ticket->title}}</div>
                                <div class="ticket-latest-message">{{$ticket->conversations[0]->content}}</div>
                                <div class="ticket-status {{$ticket->status}}"></div>
                                <div class="ticket-date">{{formatDate($ticket->created_at, 'short')}}</div>
                            </a> 
                            @endforeach
                        </section>
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
