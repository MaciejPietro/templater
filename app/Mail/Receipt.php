<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Receipt extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public Application $application;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Application $application)
    {
        $this->user = $user;
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.receipt')
        ->subject("Receipt for your Letter of no objection application payment")
        ->with(['application' => $this->application])
        ->attach($this->application->getReceiptPath());
    }
}
