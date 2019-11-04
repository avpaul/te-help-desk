@extends('layouts.app')
@section('content')
<div class="app-verify">
    @isset($message)
    <div class="message-success">{{$message}}</div>
    @endisset
    @isset($error)
    <div class="message-error">{{$error}}</div>
    @endisset
</div>
@endsection