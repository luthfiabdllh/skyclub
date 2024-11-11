<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PaymentUplouded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $booking;
    public $field;
    public $admins;
    public $total;
    /**
     * Create a new event instance.
     */
    public function __construct($booking, $total, $field)
    {
        $this->booking = $booking;
        $this->admins = User::where('role', 'admin')->get();
        $this->total = $total;
        $this->field = $field;
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
