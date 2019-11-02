<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<div id="app" class="app-signup app-auth-pages">
<nav class="transparent z-depth-0">
<div class="nav-wrapper ">
<a href="/" class="brand-logo text-primary ">HELP DESK</a>
<ul id="nav-mobile" class="right  ">
<li class="menu-item "><a href="/login" class="text-primary">LOGIN</a>
</li>
<li class="menu-item">
<a href="/signup"  class="text-primary active">SIGNUP</a>
</li>
</ul>
</div></nav>

<div class="row">
    <div class="col s8">
        <div class="app-banner">
           <h2 class="app-banner-header"><span>Got questions?</span> <span>we have answers!</span></h2>
<div class="img-wrapper">
<img src="https://image.freepik.com/free-vector/character-illustration-people-holding-speech-bubbles_53876-43081.jpg" alt="">

</div>
 
        </div>

    </div>
    <div class="col s4 login-form">
        <div class="login-form-wrapper">
            <h3 class="login-form-header"><span>Hey!</span> <span class="h4">nice to have you</span> </h3>
            <div class="input-field-wrapper">
                <div class="input-field">
                <input type="text" class="user-email" required>
                <label for="user-email">Your Email</label>
            </div>

            <div class="input-field">
                <input type="password" class="user-password" required>
                <label for="user-password">Your Password</label>
            </div>
            </div>
            
            <div class="row">
                <span class="message"></span>
            </div>

            <div class="row">
                <a href="/login" class="right password-reset-link">Have an account?</a>
            </div>

            <div class="row">
                <button class="btn btn-signup right">signup</button>
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