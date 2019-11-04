@extends('layouts.app') 
@section('content')
<div class="col s8">
    <div class="app-auth-banner">
        <h2 class="app-banner-header">
            <span>Got questions?</span>
            <span>we have answers!</span>
        </h2>
        <div class="img-wrapper">
            <img
                src="https://image.freepik.com/free-vector/character-illustration-people-holding-speech-bubbles_53876-43081.jpg"
                alt=""
            />
        </div>
    </div>
</div>
<div class="col s4 login-form">
    <div class="login-form-wrapper">
        <h3 class="login-form-header">
            <span>Hey!</span>
            <span class="h4">wellcome back</span>
        </h3>
        <div class="input-field-wrapper">
            <div class="input-field">
                <input type="text" class="user-email" required />
                <label for="user-email">Your Email</label>
            </div>

            <div class="input-field">
                <input type="password" class="user-password" required />
                <label for="user-password">Your Password</label>
            </div>
        </div>

        <div class="row">
            <span class="message"></span>
        </div>

        <div class="row">
            <a href="/reset-password" class="right password-reset-link"
                >Forgot Password?</a
            >
        </div>

        <div class="row">
            <button class="btn btn-login right">Login</button>
        </div>
    </div>
</div>
@endsection
