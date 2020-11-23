<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('frontend.' . config('nextgen.theme') . '.partials.contact')
                    ->subject($this->contact['subject'])
                    ->with([
                        'name' => $this->contact['name'],
                        'email' => $this->contact['email'],
                        'content' => $this->contact['content']
                    ]);
    }
}
