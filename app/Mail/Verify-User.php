<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyUser extends Mailable
{
    use Queueable, SerializesModels;

    public $verifyLink;

    public function __construct($verifyLink)
    {
        $this->verifyLink = $verifyLink;
    }

    public function build()
    {
        return $this->subject('Verify Your Email')
                    ->view('emails.verify_user');
    }
}
