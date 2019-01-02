<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomedeveloperEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $workhour;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($workhour)
    {
        $this->workhour = $workhour;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.welcome');
    }
}
