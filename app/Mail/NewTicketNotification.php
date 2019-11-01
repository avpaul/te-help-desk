<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewTicketNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->ticket['subject'];
        return $this->from(env('MAIL_FROM_ADDRESS','HelpDesk'))
                    ->subject($subject)
                    ->markdown('emails.ticket',
                        [
                            'ticket' => $this->ticket['ticket'], 
                            'user' => $this->ticket['user'] 
                        ]);
    }
}
