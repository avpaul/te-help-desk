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
                        <div class="user-initials">hd</div>
                    </div>
                    <button class="btn btn-flat btn-logout">
                    <i class="zmdi zmdi-lock-outline"></i>&nbsp;
                        Logout </button>
                </div>     
                </div>
            </nav>

            <div class="row app-container">
                <div class="col admin-dashboard">
                    <form action="{{route('admin.create.user')}}" method="POST">
                        @csrf
                        <h5>Create new user!</h5>
                        <div class="input-field-wrapper">
                            <div class="input-field">
                                <input type="text" class="user-email" name="email" required/>
                                <label for="user-email">User email</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="user-password" name="password" required />
                                <label for="user-password">User password</label>
                            </div>
                            <div class="input-field">
                                <select name="role">
                                  <option value="user"  selected>User</option>
                                  <option value="support">Support Engineer</option>
                                  <option value="admin">Admin User</option>
                                </select>
                                <label>User type</label>
                            </div>
                        </div>

                        <div class="form-footer">
                            <button class="btn btn-flat btn-cancel" type="reset">CLEAR</button>
                            <button class="btn btn-flat btn-create" type="submit">CREATE</button>
                        </div>
                        @isset($error)
                        <div class="error-message">{{$error}}</div>
                        @endisset
                        @isset($message)
                        <div class="success-message">{{$message}}</div>
                        @endisset
                    </form>
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
