@extends('layouts.app')
@section('content')
    <div class="desk-tickets-wrapper">
        <div class="desk-tickets-header">
            <h5 class="title">All Tickets <span>({{count($tickets)}})</span></h5>
        </div>
        <div class="ticket-section-header">
            <div>Not answered</div></div>
        <section class="pending-tickets">
            @if(count($tickets) === 0)
            <div class="no-ticket">
                <div class="no-ticket-wrapper">
                    <img src="{{asset('/conversation.svg')}}" />
                </div>
                <div class="no-ticket-tagline">
                    No ticket opened yet!
                </div>
            </div>
            @endif
            @foreach ($tickets as $ticket)
            <a class="ticket" href="/tickets/{{$ticket->id}}">
                <div class="ticket-owner">
                    <div class="user-initials">{{getUserInitials($ticket->owner->email)}}</div>
                </div>
                <div class="ticket-owner-name">{{$ticket->owner->email}}</div>
                <div class="ticket-title">{{$ticket->title}}</div>
                <div class="ticket-latest-message">{{$ticket->conversations[0]->content}}</div>
                <div class="ticket-status {{$ticket->status}}"></div>
                <div class="ticket-date">{{formatDate($ticket->created_at, 'short')}}</div>
            </a> 
            @endforeach
        </section>
    </div>
@endsection('content')
