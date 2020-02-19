<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmailForVoters;

class sendCredentialForVoters
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        

        \Mail::to($event->voter_email)->send(new sendEmailForVoters($event->url,$event->user_email,$event->voter_key,$event->voter_vid));

    }
}
