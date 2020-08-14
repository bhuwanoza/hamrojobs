<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($jobpost)
    {
        $this->jobpost = $jobpost;
    }

    /**
     * Build the message.
     *
     * @return $this
     */


    public function build()
    {
        return $this->from(getConfiguration('site_primary_email'))
            ->subject('Job Updated')
            ->markdown('emails.job_updated')
            ->with('jobpost',$this->jobpost);
    }
}
