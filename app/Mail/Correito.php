<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Correito extends Mailable
{
    use Queueable, SerializesModels;

    private $mailFrom;
    private $mailSubject;
    private $mailBody;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from, $subject, $body)
    {
        $this -> mailFrom = $from;
        $this -> mailSubject = $subject;
        $this -> mailBody = $body;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this -> from($this -> mailFrom);
        $this -> subject($this -> mailSubject);
        return $this->view('mailcito', [ "Subject" => $this -> mailSubject, "Body" => $this -> mailBody]);
    }
}
