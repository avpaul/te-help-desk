@extends('layouts.app')
@section('content')
<div class="app-verify">
    @isset($message)
    <div>
        <div class="text-primary">{{$message}}</div>
        <a href="/login" class="btn btn-login btn-flat">LOGIN</a>
    </div>
    @endisset
    @isset($error)
    <div class="message-error">{{$error}}</div>
    @endisset
</div>
@endsection