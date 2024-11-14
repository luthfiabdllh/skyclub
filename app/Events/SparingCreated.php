<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SparingCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $team_name;
    public $id_user;
    // public $sparing;

    /**
     * Create a new event instance.
     */
    public function __construct($id, $team_name)
    {
        $this->id_user = $id;
        $this->team_name = $team_name;
        // $this->sparing = $sparing;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
