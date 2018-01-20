<?php

namespace App\Events;

use App\Button;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ButtonPressEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $button;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Button $button)
    {
        $this->button = $button->all();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('buttonPressChannel');
    }

    public function broadcastWith()
    {
        return [
            'button'=> $this->button
        ];
    }
}
