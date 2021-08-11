<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForAdminMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name, $email, $message, $subject, $phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $subject, $message)
    {
        $this->name = $name;
        $this->message = $message;
        $this->email = $email;
        $this->subject = "Mail from OTS Website | " . $subject;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("no-reply@omartahersaad.com")->markdown('emails.contact-for-admins');

    }
}
