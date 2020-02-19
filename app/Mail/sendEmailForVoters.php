<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendEmailForVoters extends Mailable
{
    use Queueable, SerializesModels;

     public $url;
     public $user_email;
     public $voter_email;
     public $voter_vid;
     public $voter_key;

    public function __construct($url,$user_email,$voter_key,$voter_vid)
    {
        $this->url=$url;
        $this->user_email=$user_email;
        $this->voter_key=$voter_key;
        $this->voter_vid=$voter_vid;    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->user_email)->markdown('emails.voters.sendemailforvoters');
    }
}
