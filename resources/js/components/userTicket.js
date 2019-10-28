import { publishEvent } from '../utils/eventBus';
import { DELETE_USER_TICKET } from '../utils/eventTypes';
import { transform } from '../utils/formatDate';

export function UserTicket({
    ticketId,
    title,
    lastMessage,
    allConversations,
    status,
    createdAt
}) {
    const el = document.createElement('div');
    el.classList.add('card');

    this.render = () => {
        el.innerHTML = `
        <div class="card-content">
            <a class="card-title" href="/tickets/${ticketId}">${title}</a>
            <div class="card-body">
                <div class="ticket-date">Asked ${transform(createdAt)}</div>
                <p> ${lastMessage}</p>
            </div>
        </div>
        <div class="card-footer">
            <div class="ticket-conversations-count">
                <i class="zmdi zmdi-comments"></i>&nbsp;${allConversations}
            </div>
        <div class="ticket-status ${status}">${status}</div>
            <button class="btn btn-flat btn-icon dropdown-trigger" data-target="user-action-dropdown">
                <i class="zmdi zmdi-more-vert"></i>
            </button>
            <ul id="user-action-dropdown" class="dropdown-content">
                <li><button class="btn btn-flat"> <i class="zmdi zmdi-close-circle text-primary"></i>&nbsp;&nbsp;<span>close</span></button></li>
                <li><button class="btn btn-flat"> <i class="zmdi zmdi-check-circle text-primary"></i>&nbsp;&nbsp;<span>re-open</span></button></li>
                <li><button class="btn btn-flat" onClick=""><i class="zmdi zmdi-delete text-danger"></i>&nbsp;&nbsp;<span>delete</span></button></li>
            </ul>
        </div>`;
    };
}
