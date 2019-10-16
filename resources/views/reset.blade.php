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

<div id="app" class="app-reset app-auth-pages">
<nav class="transparent z-depth-0">
<div class="nav-wrapper ">
<a href="/" class="brand-logo text-primary ">HELP DESK</a>
<ul id="nav-mobile" class="right  ">
<li class="menu-item "><a href="/login" class="text-primary active">Login</a>
</li>
<li class="menu-item">
<a href="/signup"  class="text-primary">Sign Up</a>
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
            <h3 class="login-form-header"><span>Hey!</span> <span class="h4">it just happens</span> </h3>
            
            
            <div class="input-field-wrapper">
            <div class="row">
                <p class="reset-password-label">Give us your email, we will send you a link to reset your password.</p>
            </div>
                <div class="input-field">
                <input type="email" id="user-email">
                <label for="user-email">Your Email</label>
            </div>

            
            </div>
            

            

            <div class="row">
                <button class="btn btn-login right">Reset</button>
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