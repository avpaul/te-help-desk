@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col s10 offset-s1">
            <div class="user-tickets-wrapper">
                <div
                    class="modal modal-new-ticket"
                    id="new-ticket-modal"
                >
                    <div class="card z-depth-0">
                        <div class="card-content">
                            <span class="card-title">New Ticket</span>
                            <input
                                type="text"
                                placeholder="Ticket title"
                                class="ticket-title"
                            />
                            <div
                                class="ticket-editor"
                                contenteditable
                                placeholder="What is the problem?"
                            ></div>
                        </div>

                        <div class="card-action">
                            <button
                                class="btn btn-flat btn-cancel-ticket"
                            >
                                <i class="zmdi zmdi-close"></i
                                >&nbsp;cancel
                            </button>
                            <button
                                class="btn btn-flat btn-create-ticket"
                            >
                                <i class="zmdi zmdi-check"></i
                                >&nbsp;create
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- user-pages user-pages-home -->