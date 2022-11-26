<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        protected string $order_id,
        protected string $del_name,
        protected string $del_img,
        protected string $del_car,
        protected string $del_number
    )
    {
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('privateOrder_'.$this->order_id);
    }

    public function broadcastAs()
    {
        return 'order';
    }

    public function broadcastWith()
    {
        return [
            'del_img' => $this->del_img,
            'del_name' => $this->del_name,
            'del_car' => $this->del_car,
            'del_number' => $this->del_number
        ];
    }
}
