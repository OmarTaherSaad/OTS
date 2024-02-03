<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForAdminMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $message;
    public $subject;
    public $phone;
    public $date;

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
        $this->date = date('Y-m-d h:i A');
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
