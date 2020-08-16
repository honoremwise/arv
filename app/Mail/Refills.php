<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Refills extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public $lists;
    public function __construct( $lists)
    {
        $this->lists= $lists;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.refills')
            ->from('hmwiseneza@gmail.com')
            ->subject('ARV Program')
            ->with(['lists'=>$this->lists
            ]);
    }
}
