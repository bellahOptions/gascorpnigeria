<?php

namespace App\Mail;

use App\Models\WaitlistSignup;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WaitlistSignupConfirmation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public WaitlistSignup $waitlistSignup;

    public function __construct(WaitlistSignup $waitlistSignup)
    {
        $this->waitlistSignup = $waitlistSignup;
    }

    public function build(): self
    {
        return $this->subject('You are on the GASCORP App Waitlist')
            ->view('emails.waitlist-confirmation');
    }
}
