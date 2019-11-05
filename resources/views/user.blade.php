@extends('layouts.app') @section('content')
    <div class="col s10 offset-s1">
        <div class="user-tickets-wrapper">
            <div class="user-tickets-header">
                <h5 class="title">
                    All Tickets <span>({{ count($tickets) }})</span>
                </h5>
                <button
                    class="btn btn-flat btn-add-new-ticket waves-effect waves-light modal-trigger"
                    data-target="new-ticket-modal"
                >
                    <i class="zmdi zmdi-plus-circle-o"></i>&nbsp; New Ticket
                </button>
            </div>
            @if(count($tickets) === 0)
            <div class="no-ticket">
                <div class="no-ticket-wrapper">
                    <img src="/conversation.svg" />
                </div>
                <div class="no-ticket-tagline">
                    Ready to help you!
                </div>
            </div>
            @endif

            <section class="pending-tickets">
                @foreach ($tickets as $ticket)
                <div class="card">
                    <div class="card-content">
                        <a
                            class="card-title"
                            href="/tickets/{{$ticket->id}}"
                            >{{$ticket->title}}</a
                        >
                        <div class="card-body">
                            <div class="ticket-date">
                                {{formatDate($ticket->created_at)}}
                            </div>
                            <p>{{$ticket->conversations[0]->content}}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="ticket-conversations-count">
                            <i class="zmdi zmdi-comments"></i
                            >&nbsp;{{$ticket->conversationsCount}}
                        </div>
                        <div class="ticket-status {{$ticket->status}}">
                            {{$ticket->status}}
                        </div>
                        <button
                            class="btn btn-flat btn-icon dropdown-trigger"
                            data-target="{{'user-action-dropdown-'.$ticket->id}}"
                        >
                            <i class="zmdi zmdi-more-vert"></i>
                        </button>

                        <ul
                            id="{{'user-action-dropdown-'.$ticket->id}}"
                            class="dropdown-content"
                        >
                            @if ($ticket->status === "pending" ||
                            $ticket->status === "active")
                            <li>
                                <button
                                    class="btn btn-flat"
                                    onclick="document.forms['closeTicket-{{$ticket->id}}'].submit()"
                                >
                                    <i
                                        class="zmdi zmdi-close-circle text-primary"
                                    ></i>
                                    <span>close</span>
                                </button>
                            </li>
                            <form
                                action="{{route('tickets.update',['id' => $ticket->id])}}"
                                method="POST"
                                name="closeTicket-{{$ticket->id}}"
                                hidden
                            >
                                @csrf @method('PUT')
                                <input
                                    type="text"
                                    name="status"
                                    value="closed"
                                />
                            </form>
                            @else
                            <li>
                                <button
                                    class="btn btn-flat"
                                    onclick="document.forms['openTicket-{{$ticket->id}}'].submit()"
                                >
                                    <i
                                        class="zmdi zmdi-check-circle text-primary"
                                    ></i>
                                    <span>re-open</span>
                                </button>
                            </li>
                            <form
                                action="{{route('tickets.update',['id' => $ticket->id])}}"
                                method="POST"
                                name="openTicket-{{$ticket->id}}"
                                hidden
                            >
                                @csrf @method('PUT')
                                <input
                                    type="text"
                                    name="status"
                                    value="active"
                                />
                            </form>
                            @endif

                            <li>
                                <button
                                    class="btn btn-flat"
                                    onclick="document.forms['deleteTicket-{{$ticket->id}}'].submit()"
                                >
                                    <i class="zmdi zmdi-delete text-danger"></i>
                                    <span>delete</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <form
                    action="{{route('tickets.destroy',['id' => $ticket->id])}}"
                    method="POST"
                    name="deleteTicket-{{$ticket->id}}"
                    hidden
                >
                    @csrf @method('DELETE')
                </form>
                @endforeach
            </section>

            <div class="modal modal-new-ticket" id="new-ticket-modal">
                <form
                    class="card z-depth-0"
                    action="{{ route('tickets.post') }}"
                    method="POST"
                >
                    @csrf
                    <div class="card-content">
                        <span class="card-title">New Ticket</span>
                        <input
                            type="text"
                            placeholder="Ticket title"
                            class="ticket-title"
                            name="ticketTitle"
                        />

                        <textarea
                            class="ticket-editor"
                            placeholder="What is the problem?"
                            name="ticketContent"
                        ></textarea>
                    </div>

                    <div class="card-action">
                        <button
                            class="btn btn-flat btn-cancel-ticket"
                            type="reset"
                        >
                            <i class="zmdi zmdi-close"></i>&nbsp;cancel
                        </button>
                        <button
                            class="btn btn-flat btn-create-ticket"
                            type="submit"
                        >
                            <i class="zmdi zmdi-check"></i>&nbsp;create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()
