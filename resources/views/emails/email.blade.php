@component('mail::layout')
{{-- Header --}}
@slot('header')
<style>
    .email__wrapper{
    }
    .email__wrapper--panel{
        background-color: #f0f4f8;
    }
    .img-wrapper{
        width: 96px;
        height: 96px;
        margin: 32px auto;
    }
    .img-wrapper img{
        height: 100%; 
    }
    .tagline{
        margin-left: auto;
        margin-right: auto;
        font-size: 26px;
        font-weight: 600;
        color: #003e6b;
        text-align: center;
    }
    .tagline-description{
        max-width: 420px;
        margin-left: auto;
        margin-right: auto;
        font-size: 18px;
        font-weight: 300;
        text-align: center;
    }
    .user-email{
        color: #4098D7;
    }
    .btn-verify{
        display: block;
        border: none;
        width: 288px;
        min-height: 36px;
        padding: 8px 16px;
        margin: 64px auto 128px;
        font-weight: 400;
        text-align: center;
        cursor: pointer;
        font-size: 16px;
        line-height: 36px;
        text-decoration: none;
        background-color: #003e6b;
        color: #ffffff;
        border-radius: 2px;
    }
</style>
@endslot
{{-- Body --}}
@slot('subcopy')
@component('mail::panel')
<div class="email__wrapper">
<div class="email__wrapper--panel">
    <div>
        <div class="img-wrapper img-email">
            <img src="{{asset('/email.png')}}"/>
        </div>
        <h2 class="tagline">Verify your email address</h2>
        <p class="tagline-description">
            Hey, to start using Helpdesk, we need to verify your email <span class="user-email">{{$email}}<span>
        </p>
    </div>
    <div>   
        <a href="{{$link}}" class="btn btn-verify">CLICK TO VERIFY</a>
    </div>
</div>
</div>
@endcomponent
@endslot
{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} TechEnfold. Powered by HelpDesk!
@endcomponent
@endslot
@endcomponent
