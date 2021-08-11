<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App;

class ContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name, $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $message)
    {
        $this->name = $name;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("OTS received your mail!")->replyTo("contact@omartahersaad.com", "OTS Contact")->from("no-reply@omartahersaad.com")->markdown('emails.contact_us');
    }
}
