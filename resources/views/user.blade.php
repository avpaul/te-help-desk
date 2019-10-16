<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Help Desk</title>
        <!-- <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,600"
            rel="stylesheet"
        /> -->
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
        <div id="app" class="user-pages user-pages-home">
            <nav class="transparent z-depth-0">
                <div class="nav-wrapper ">
                    <a href="/" class="brand-logo text-primary ">HELP DESK</a>
                    <div class="nav-actions right">
                    <div class="user-profile ">
                        <img
                            src="https://picsum.photos/id/1027/200/300"
                            alt="email"
                        /></div>
                    <button class="btn btn-flat btn-logout">
                    <i class="zmdi zmdi-lock-outline"></i>&nbsp;
                        Logout </button>
                </div>
                    
                </div>
            </nav>

            <div class="row">
                <!-- <div class="col s3"></div> -->
                <div class="col s10 offset-s1">
                    <div class="user-tickets-wrapper">
                        <div class="user-tickets-header">
                            <h5 class="title">All Tickets <span>(4)</span></h5>
                            <button class="btn btn-flat btn-add-new-ticket waves-effect waves-light modal-trigger" data-target="new-ticket-modal">
                            <i class="zmdi zmdi-plus-circle-o"></i>&nbsp;
                            New Ticket</button>
                        </div>

                        <section class="pending-tickets">
                            <div class="card">
                                <div class="card-content">
                                    <a class="card-title" href="/tickets/96745">
                                        Finding the balance after a certain
                                        given number of days
                                    </a>
                                    <div class="card-body">
                                        <div class="ticket-date">
                                            Asked today
                                        </div>
                                        <p>
                                            I'm having an issue with the
                                            settings, they are not working as
                                            expected. I'm double checking the
                                            values but they are not the same.
                                        </p>
                                        
                                    </div>
                                </div>
                                <div class="card-footer">
                                <div class="ticket-conversations-count">
                                        <i class="zmdi zmdi-comments"></i>&nbsp;2
                                        </div>
                                    <div class="ticket-status active">
                                        active
                                    </div>
                                    <button class="btn btn-flat btn-icon dropdown-trigger" data-target="user-action-dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </button>

                                    <ul id="user-action-dropdown" class="dropdown-content">
                                        <li><button class="btn btn-flat"> <i class="zmdi zmdi-close-circle text-primary"></i>&nbsp;&nbsp;<span>close</span></button></li>
                                        <li><button class="btn btn-flat"> <i class="zmdi zmdi-check-circle text-primary"></i>&nbsp;&nbsp;<span>re-open</span></button></li>
                                        <li><button class="btn btn-flat"><i class="zmdi zmdi-delete text-danger"></i>&nbsp;&nbsp;<span>delete</span></button></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <a class="card-title" href="/tickets/355874">
                                        Finding the balance after a certain
                                        given number of days
                                    </a>
                                    <div class="card-body">
                                        <div class="ticket-date">
                                            Asked today
                                        </div>
                                        <p>
                                            I'm having an issue with the
                                            settings, they are not working as
                                            expected. I'm double checking the
                                            values but they are not the same.
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                <div class="ticket-conversations-count">
                                        <i class="zmdi zmdi-comments"></i>&nbsp;0
                                        </div>
                                    <div class="ticket-status pending">
                                        pending
                                    </div>
                                    <button class="btn btn-flat btn-icon">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <a class="card-title" href="/tickets/73546">
                                        Finding the balance after a certain
                                        given number of days
                                    </a>
                                    <div class="card-body">
                                        <div class="ticket-date">
                                            Asked 05 days ago
                                        </div>
                                        <p>
                                            I'm having an issue with the
                                            settings, they are not working as
                                            expected. I'm double checking the
                                            values but they are not the same.
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer">

                                <div class="ticket-conversations-count">
                                        <i class="zmdi zmdi-comments"></i>&nbsp;5
                                        </div>
                                    <div class="ticket-status closed">
                                        closed
                                    </div>
                                    <button class="btn btn-flat btn-icon">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <a class="card-title" href="/tickets/5345245">
                                        Finding the balance after a certain
                                        given number of days
                                    </a>
                                    <div class="card-body">
                                        <div class="ticket-date">
                                            Asked 12 days ago
                                        </div>
                                        <p>
                                            I'm having an issue with the
                                            settings, they are not working as
                                            expected. I'm double checking the
                                            values but they are not the same.
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                <div class="ticket-conversations-count">
                                        <i class="zmdi zmdi-comments"></i>&nbsp;8
                                        </div>
                                    <div class="ticket-status closed">
                                        closed
                                    </div>
                                    <button class="btn btn-flat btn-icon">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </button>
                                </div>
                            </div>
                        </section>

                        <div class="modal modal-new-ticket" id="new-ticket-modal">

                        <div class="card z-depth-0">

                        <div class="card-content">
                            <span class="card-title">New Ticket</span>
                            <input type="text" placeholder="Ticket title" class="ticket-title">

                            <div class="ticket-editor" contenteditable placeholder="What is the problem?"></div>
                        </div>

                        <div class="card-action">
                            <button class="btn btn-flat btn-cancel-ticket"><i class="zmdi zmdi-close"></i>&nbsp;cancel</button>
                            <button class="btn btn-flat btn-create-ticket"><i class="zmdi zmdi-check"></i>&nbsp;create</button>
                        </div>
                        
                        </div>
                        

                        </div>
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
