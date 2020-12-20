<?php

namespace App\Events;

use App\Models\Event;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AwardProcess
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $event;
    public $code;
    public $mobile;

    /**
     * Create a new event instance.
     * @param Event $event
     * @param string $code
     * @param string $mobile
     *
     * @return void
     */
    public function __construct($event, $code, $mobile)
    {
        $this->event = $event;
        $this->code = $code;
        $this->mobile = $mobile;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
