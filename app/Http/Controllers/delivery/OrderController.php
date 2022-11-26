<?php

namespace App\Http\Controllers\delivery;

use App\Http\Controllers\Controller;
use App\Models\OldOrder;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        return view('delivery.index', [
            'orders' => Order::where('is_active', false)
                ->where('is_sent', true)
                ->with('restaurant', 'client')
                ->get(),
        ]);
    }

    public function show()
    {
        return view('delivery.order', [
            'order' => Order::where('delivery_id', auth()->user()->id)->with('restaurant', 'client')->first()
        ]);
    }

    public function destroy(Order $order)
    {
        OldOrder::create([
            'restaurant_id' => $order->restaurant_id,
            'delivery_id' => $order->delivery_id,
            'client_id' => $order->client_id,
            'order' => $order->order,
            'sum_order' => $order->sum_order
        ]);

        $order->delete();

        return redirect(route('delivery.index'))->with('message', 'delivered successfully');
    }

    public function oldOrdersIndex()
    {
        return view('delivery.oldOrders', [
            'orders' => OldOrder::latest()->with('restaurant')->paginate()
        ]);
    }
}
