@extends('layouts.app')
@section('content')

<div class="col s8">
        <div class="app-banner">
           <h2 class="app-banner-header"><span>Got questions?</span> <span>we have answers!</span></h2>
<div class="img-wrapper">
<img src="https://image.freepik.com/free-vector/character-illustration-people-holding-speech-bubbles_53876-43081.jpg" alt="">

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
@endsection