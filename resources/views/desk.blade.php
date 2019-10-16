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
        <div id="app" class="desk-pages desk-pages-home">
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

            <div class="row app-container">
                <!-- <div class="col s3"></div> -->
                <!-- <div class="col s8 "> -->
                    <div class="desk-tickets-wrapper">
                        <div class="desk-tickets-header">
                            <h5 class="title">All Tickets <span>(4)</span></h5>
                        </div>
                        <div class="ticket-section-header">
                            <div>Not answered</div></div>
                        <section class="pending-tickets">
                            
                            <a class="ticket" href="/tickets/435634">
                                <div class="ticket-owner">
                                    <img src="https://picsum.photos/id/1027/200/300"alt="email"/>
                                </div>
                                <div class="ticket-owner-name">erica@drums.rw</div>
                                <div class="ticket-title">
                                Finding the balance after a certain
                                        given number of days
                                </div>

                                <div class="ticket-latest-message">
                                I'm having an issue with the
                                            settings, they are not working as
                                            expected.
                                </div>

                                <div class="ticket-status pending"></div>

                                <div class="ticket-date">
                                            10:41 am
                                        </div>
</a>

                            <a class="ticket" href="/tickets/435634">
                                <div class="ticket-owner">
                                    <div class="user-initials">
                                        av
                                    </div>
                                </div>
                                <div class="ticket-owner-name">elliot@elliot.rw</div>
                                <div class="ticket-title">
                                Finding the balance after a certain
                                        given number of days
                                </div>
                                <div class="ticket-latest-message">
                                I'm having an issue with the
                                            settings, they are not working as
                                            expected.
                                </div>

                                <div class="ticket-status active"></div>

                                <div class="ticket-date">
                                            08:54 am
                                        </div>
</a>

                            <a class="ticket" href="/tickets/435634">
                                <div class="ticket-owner">
                                    <div class="user-initials">
                                        ed
                                    </div>
                                </div>
                                <div class="ticket-owner-name">elliot@elliot.rw</div>
                                <div class="ticket-title">
                                Finding the balance after a certain
                                        given number of days
                                </div>
                                <div class="ticket-latest-message">
                                I'm having an issue with the
                                            settings, they are not working as
                                            expected.
                                </div>

                                <div class="ticket-status active"></div>

                                <div class="ticket-date">
                                            08:54 am
                                        </div>
</a>
                           
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
