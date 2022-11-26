<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RestaurantOrdersEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        protected string $res_id,
        protected string $order_id,
        protected string $del_name,
        protected string $order_order,
        protected string $sum_order,
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
        return new PrivateChannel('privateRestaurant_'. $this->res_id);
    }

    public function broadcastAs()
    {
        return 'restaurantOrders';
    }

    public function broadcastWith()
    {
        return [
            'order_id' => $this->order_id,
            'del_name' => $this->del_name,
            'order_order' => $this->order_order,
            'sum_order' => $this->sum_order
        ];
    }
}
