<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Chat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userName = '';
    public $message = '';
    /**
     * Create a new event instance.
     */
    public function __construct($userName ,$message)
    {
        $this->userName = $userName;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    // this function default with laravel 10 
    // public function broadcastOn(): array
    // {
    //     // return [
    //     //     new PrivateChannel('channel-name'),
    //     // ];

    // }

    // ------------------------------

    public function broadcastOn()
    {
        return new Channel('laravel-chat');
    }
    public function broadcastAs()
    {
        return "chatting";    
    }
    
    
}
