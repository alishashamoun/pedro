<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StatusLiked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
public $message;

    public function __construct($username)
    {
        $this->username = $username;
        $this->message = "{$username} liked your status";
        // dd($username);
    }

    public function broadcastAs()
    {
        return 'status.liked';
    }
    public function broadcastOn()
    {
        return ['post-liked'];
    }
    public function broadcastWith()
{
    return ['message' => $this->message,'problem_id'=> '5'];
}

}
