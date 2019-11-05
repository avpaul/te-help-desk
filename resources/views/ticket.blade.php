@extends('layouts.app') @section('content')
    <div class="col s3  user-tickets-sidebar-wrapper">
        <div class="user-tickets-header">
            @if (getUser()->role === 'support')
            <h5 class="title">
                All Tickets <span>({{ count($tickets) }})</span>
            </h5>
            @else
            <h5 class="title">
                Your Tickets <span>({{ count($tickets) }})</span>
            </h5>
            @endif
        </div>

        <div class="user-ticket-group">
            @foreach ($tickets as $ticket)
            <a
                class="user-ticket-snap {{($ticket->id === $mainTicket->id ? 'active' : '')}}"
                href="/tickets/{{$ticket->id}}"
            >
                <div class="title">{{$ticket->title}}</div>
                <div class="user-ticket-snap-footer">
                    <div class="time">{{formatDate($ticket->created_at)}}</div>
                    <div class="status {{$ticket->status}}"></div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="col s8 user-single-ticket-wrapper">
        <div class="user-single-ticket">
            <div class="user-ticket-header">
                <h5 class="title">{{$mainTicket->title}}</h5>
                <div class="ticket-meta">
                    <div class="ticket-date">
                        {{formatDate($mainTicket->created_at)}}
                    </div>
                    <div class="ticket-conversations-count">
                        <i class="zmdi zmdi-comments"></i>&nbsp;<span
                            >{{count($mainTicket->conversations)}}</span
                        >
                    </div>
                    <div class="ticket-status {{$mainTicket->status}}">
                        {{$mainTicket->status}}
                    </div>
                </div>
            </div>
            <div class="user-ticket-conversations-shadow-top"></div>
            <div class="user-ticket-conversations">
                @foreach ($mainTicket->conversations as $conversation)
                <div
                    class="user-ticket-conversation {{$conversation->owner->id === getUser()->id ? 'current-user' : ''}}"
                >
                    <div
                        class="conversation-owner"
                        title="{{$conversation->owner->email}}"
                    >
                        @if ($conversation->owner->role === 'user')
                        <div class="user-initials">
                            {{getUserInitials($conversation->owner->email)}}
                        </div>
                        @else
                        <div class="user-initials">hd</div>
                        @endif
                    </div>
                    <div class="conversation-content">
                        {{$conversation->content}}
                    </div>
                </div>
                @endforeach
            </div>

            <div class="ticket-footer">
                @if ((getUser()->role === 'user' || getUser()->role === 'admin')
                && $mainTicket->status !== 'closed')
                <button
                    class="btn btn-flat btn-close waves-effect waves-light"
                    title="Close Ticket"
                    onclick="document.forms['closeTicket'].submit()"
                >
                    <i class="zmdi zmdi-close-circle"></i>&nbsp;&nbsp;<span
                        >close</span
                    >
                </button>
                <form
                    action="{{route('tickets.update',['id' => $mainTicket->id])}}"
                    method="POST"
                    name="closeTicket"
                    hidden
                >
                    @csrf @method('PUT')
                    <input type="text" name="status" value="closed" />
                </form>
                @endif
                <button
                    class="btn btn-flat btn-reply waves-effect waves-light"
                    title="Reply Ticket"
                >
                    <i class="zmdi zmdi-mail-send"></i>&nbsp;&nbsp;<span
                        >reply</span
                    >
                </button>
            </div>

            <form
                class="ticket-reply"
                action="{{route('conversation.post',['id' => $mainTicket->id])}}"
                method="POST"
            >
                @csrf
                <textarea
                    class="ticket-reply-editor"
                    placeholder="Your reply here..."
                    name="content"
                ></textarea>
                <div class="ticket-reply-footer">
                    <button
                        class="btn btn-flat btn-delete waves-effect"
                        title="Cancel Reply"
                        type="reset"
                    >
                        <i class="zmdi zmdi-close-circle"></i>&nbsp;&nbsp;<span
                            >cancel</span
                        >
                    </button>
                    <button
                        class="btn btn-flat waves-effect"
                        title="Send Reply"
                        type="submit"
                    >
                        <i class="zmdi zmdi-mail-send text-primary"></i
                        >&nbsp;&nbsp;<span>send</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
