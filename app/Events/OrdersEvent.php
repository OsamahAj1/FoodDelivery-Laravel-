<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrdersEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        protected string $order_id,
        protected string $res_img,
        protected string $res_name,
        protected string $res_adr,
        protected string $res_id,
        protected string $order,
        protected string $sum_order,
        protected string $client_adr
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
        return new Channel('publicOrders');
    }

    public function broadcastAs()
    {
        return 'orders';
    }

    public function broadcastWith()
    {
        return [
            'order_id' => $this->order_id,
            'res_img' => $this->res_img,
            'res_name' => $this->res_name,
            'res_adr' => $this->res_adr,
            'res_id' => $this->res_id,
            'order' => $this->order,
            'sum_order' => $this->sum_order,
            'client_adr' => $this->client_adr
        ];
    }
}
