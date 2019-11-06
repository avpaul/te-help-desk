@component('mail::layout')
{{-- Header --}}
@slot('header')
<style>
    
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
    .ticket__title--label
    .ticket__title{
        max-width: 352px;
        margin-left: auto;
        margin-right: auto;
        font-size: 18px;
        font-weight: 300;
    }
    .ticket__title--label{
        color: #000000;
        margin-top: 8px;
        margin-bottom: 8px;
    }
    .ticket__title{
        font-size: 20px;
        font-weight: 400;
        color: #003e6b;;
    }
    .btn-reply{
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
            <img src="{{asset('/message.png')}}"/>
        </div>
        <h2 class="tagline">Ticket closed!</h2>
        <div class="ticket__title--label">Ticket title:</div>
        <p class="ticket__title">{{$ticket}}</p>
    </div>
    <div>   
        <a href="{{$link}}" class="btn btn-reply">REPLY TO REOPEN</a>
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
