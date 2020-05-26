<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BienvenidaCorreo extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $address = 'kmonge_rey@hotmail.com';
        $subject = 'CINE <3';
        $name = 'Cine Progra Internet';

        return $this->view('emails.email')
                    ->from($address)
                    ->subject($subject)
                    ->with([ 'test_message' => $this->user ]);
    }
}
