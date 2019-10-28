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
        <div id="app" class="user-pages user-pages-home">
            <nav class="transparent z-depth-0">
                <div class="nav-wrapper ">
                    <a href="/" class="brand-logo text-primary ">HELP DESK</a>
                    <div class="nav-actions right">
                        <div class="user-profile">
                            <img src="/user-96.png" alt="user profile" />
                        </div>
                        <button class="btn btn-flat btn-logout">
                            <i class="zmdi zmdi-lock-outline"></i>&nbsp; Logout
                        </button>
                    </div>
                </div>
            </nav>

            <div class="row">
                <div class="col s10 offset-s1">
                    <div class="user-tickets-wrapper">
                        <div
                            class="modal modal-new-ticket"
                            id="new-ticket-modal"
                        >
                            <div class="card z-depth-0">
                                <div class="card-content">
                                    <span class="card-title">New Ticket</span>
                                    <input
                                        type="text"
                                        placeholder="Ticket title"
                                        class="ticket-title"
                                    />

                                    <div
                                        class="ticket-editor"
                                        contenteditable
                                        placeholder="What is the problem?"
                                    ></div>
                                </div>

                                <div class="card-action">
                                    <button
                                        class="btn btn-flat btn-cancel-ticket"
                                    >
                                        <i class="zmdi zmdi-close"></i
                                        >&nbsp;cancel
                                    </button>
                                    <button
                                        class="btn btn-flat btn-create-ticket"
                                    >
                                        <i class="zmdi zmdi-check"></i
                                        >&nbsp;create
                                    </button>
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
