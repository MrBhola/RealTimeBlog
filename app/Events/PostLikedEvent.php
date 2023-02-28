<?php

namespace App\Events;


 use App\Models\Like;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Auth\Authenticatable;

class PostLikedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets;


    /**
     * Create a new event instance.
     */
    public function __construct(public $receiverId, public $userName, public $postLink)
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('post-liked.' . $this->receiverId),
        ];
    }
}
