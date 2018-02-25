<?php

namespace App\Mail;

use App\Models\Contact as ContactData;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Contact data [message, title]
     * @var [ContactData]
     */
    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactData $contact)
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
        return $this->markdown('mails.contact');
    }
}
