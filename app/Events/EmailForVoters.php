<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EmailForVoters
{
    use Dispatchable, InteractsWithSockets, SerializesModels;




    public $url;
    public $user_email;
    public $voter_email;
    public $voter_key;
    public $voter_vid;

    public function __construct($url,$user_email,$voter_email,$voter_key,$voter_vid)
    {
        $this->url=$url;
        $this->user_email=$user_email;
        $this->voter_email=$voter_email;
        $this->voter_key=$voter_key;
        $this->voter_vid=$voter_vid;
       
    }

    
}
