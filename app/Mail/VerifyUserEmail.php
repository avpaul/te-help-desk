<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyUserEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $subject = 'Just one step to get help!';
        return $this->from(env('MAIL_FROM_ADDRESS','HelpDesk'))
                    ->subject($subject)
                    ->markdown('emails.email',
                        [
                            'link' => $this->details['link'], 
                            'email' => $this->details['email'] 
                        ]);
    }
}
