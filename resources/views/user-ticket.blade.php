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
        <div id="app" class="user-pages user-pages-ticket">
            <nav class="transparent z-depth-0">
                <div class="nav-wrapper ">
                    <a href="/user" class="brand-logo text-primary "
                        >HELP DESK</a
                    >
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

            <div class="row content-wrapper">
                <div class="col s3  user-tickets-wrapper">
                    <div class="user-tickets-header">
                        <h6 class="title">Your Tickets <span>(4)</span></h6>
                    </div>

                    <div class="user-ticket-group">
                        <a class="user-ticket-snap active" href="/ticket/5">
                            <div class="title">
                                Finding the balance after a certain given number
                                of days
                            </div>
                            <div class="user-ticket-snap-footer">
                                <div class="time">today</div>
                                <div class="status active"></div>
                            </div>
                        </a>

                        <a class="user-ticket-snap" href="/ticket/5">
                            <div class="title">
                                Finding the balance after a certain given number
                                of days
                            </div>
                            <div class="user-ticket-snap-footer">
                                <div class="time">yesterday</div>
                                <div class="status pending"></div>
                            </div>
                        </a>

                        <a class="user-ticket-snap" href="/ticket/5">
                            <div class="title">
                                Finding the balance after a certain given number
                                of days
                            </div>
                            <div class="user-ticket-snap-footer">
                                <div class="time">05 days ago</div>
                                <div class="status closed"></div>
                            </div>
                        </a>

                        <a class="user-ticket-snap" href="/ticket/5">
                            <div class="title">
                                Finding the balance after a certain given number
                                of days
                            </div>
                            <div class="user-ticket-snap-footer">
                                <div class="time">10 days ago</div>
                                <div class="status closed"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col s8 user-single-ticket-wrapper">
                    <div class="user-single-ticket">
                        <div class="user-ticket-header">
                            <h5 class="title">
                                Finding the balance after a certain given number
                                of days
                            </h5>

                            <div class="ticket-meta">
                                <div class="ticket-date">
                                    Asked today
                                </div>
                                <div class="ticket-conversations-count">
                                    <i class="zmdi zmdi-comments"></i
                                    >&nbsp;<span>2</span>
                                </div>
                                <div class="ticket-status active">
                                    active
                                </div>
                            </div>
                        </div>
                        <div class="user-ticket-conversations-shadow-top"></div>
                        <div class="user-ticket-conversations">
                            <div class="user-ticket-conversation user">
                                <div class="conversation-owner">
                                    <img
                                        src="https://picsum.photos/id/1027/200/300"
                                        alt="user"
                                    />
                                </div>
                                <div class="conversation-content">
                                    I'm having an issue with the settings, they
                                    are not working as expected. I'm double
                                    checking the values but they are not the
                                    same.
                                </div>
                            </div>

                            <div class="user-ticket-conversation user">
                                <div class="conversation-owner">
                                    <img
                                        src="https://picsum.photos/id/1027/200/300"
                                        alt="user"
                                    />
                                </div>
                                <div class="conversation-content">
                                    I'm having an issue with the settings, they
                                    are not working as expected. I'm double
                                    checking the values but they are not the
                                    same.
                                </div>
                            </div>

                            <div class="user-ticket-conversation desk">
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
                            </div>

                            <div class="user-ticket-conversation user">
                                <div class="conversation-owner">
                                    <img
                                        src="https://picsum.photos/id/1027/200/300"
                                        alt="user"
                                    />
                                </div>
                                <div class="conversation-content">
                                    I'm having an issue with the settings, they
                                    are not working as expected. I'm double
                                    checking the values but they are not the
                                    same.
                                </div>
                            </div>

                            <div class="user-ticket-conversation desk">
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
                            </div>
                            <div class="user-ticket-conversation user">
                                <div class="conversation-owner">
                                    <img
                                        src="https://picsum.photos/id/1027/200/300"
                                        alt="user"
                                    />
                                </div>
                                <div class="conversation-content">
                                    I'm having an issue with the settings, they
                                    are not working as expected. I'm double
                                    checking the values but they are not the
                                    same.
                                </div>
                            </div>
                            <div class="user-ticket-conversation desk">
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
                            </div>
                        </div>

                        <div class="ticket-footer">
                            <button
                                class="btn btn-flat btn-close waves-effect waves-light"
                                title="Close Ticket"
                            >
                                <i class="zmdi zmdi-close-circle"></i
                                >&nbsp;&nbsp;<span>close</span>
                            </button>

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

                        <div class="ticket-reply">
                            <div
                                class="ticket-reply-editor"
                                contenteditable
                                placeholder="Your reply here..."
                            ></div>
                            <div class="ticket-reply-footer">
                                <button
                                    class="btn btn-flat btn-delete waves-effect"
                                    title="Cancel Reply"
                                >
                                    <i class="zmdi zmdi-close-circle"></i
                                    >&nbsp;&nbsp;<span>cancel</span>
                                </button>
                                <button
                                    class="btn btn-flat waves-effect"
                                    title="Send Reply"
                                >
                                    <i
                                        class="zmdi zmdi-mail-send text-primary"
                                    ></i
                                    >&nbsp;&nbsp;<span>send</span>
                                </button>
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
