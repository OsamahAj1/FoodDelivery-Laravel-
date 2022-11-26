<?php

namespace App\Http\Controllers\ChannelsApis;

use App\Events\OrderEvent;
use App\Events\OrdersEvent;
use App\Events\RestaurantOrdersEvent;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function send()
    {
        $data = json_decode(request()->data);

        Order::findOrFail($data->order_id)->update(['is_sent' => true]);

        event(new OrdersEvent(
            $data->order_id,
            $data->res_img,
            $data->res_name,
            $data->res_adr,
            $data->res_id,
            $data->order,
            $data->sum_order,
            $data->client_adr
        ));

        return response()->json(['message' => 'Sent Successfully'], 201);
    }

    public function accept()
    {
        $data = json_decode(request()->data);

        $order = Order::findOrFail($data->order_id);

        if ($order->is_active == true) {
            return response()->json(['error' => 'Error accepting order'], 400);
        }

        $order->is_active = true;
        $order->delivery_id = $data->del_id;
        $order->save();

        event(new OrderEvent(
            $data->order_id,
            $data->del_name,
            $data->del_img,
            $data->del_car,
            $data->del_number
        ));

        return response()->json(['message' => 'accepted successfully']);
    }

    public function sendToRestaurant()
    {
        $data = json_decode(request()->data);

        event(new RestaurantOrdersEvent(
            $data->res_id,
            $data->order_id,
            $data->del_name,
            $data->order_order,
            $data->sum_order
        ));

        return response()->json(['message' => 'sent successfully'], 201);
    }
}
