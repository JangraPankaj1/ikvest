<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    public $code;
    public $user;

    public function __construct($code, $user)
     {
        $this->code = $code;
        $this->user = $user;

     }
   
    public function build()
    {
        return $this->markdown('emails.verify_email')->with([
            'code' => $this->code,
            'user' => $this->user,
        ]);
    }

}
