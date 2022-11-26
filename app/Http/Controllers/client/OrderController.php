<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OldOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show()
    {
        return view('client.order', [
            'order' => Order::where('client_id', auth()->user()->id)->with('client', 'restaurant')->first(),
        ]);
    }

    public function place()
    {
        $cart = Cart::where('client_id', auth()->user()->id)->first();
        $order = Order::where('client_id', auth()->user()->id)->first();

        if ($order) {
            return back()->with(['message' => 'You already have order wait tell it end so you can order again']);
        }

        if (!$cart) {
            return back()->with(['message' => 'Cart is empty']);
        }

        $order = Cart::where('client_id', auth()->user()->id)
            ->select('number', 'food_id')
            ->with('food:id,name')
            ->get()
            ->map(fn($food) => $food->number . ' ' . $food->food->name)
            ->join(' - ');

        $restaurant_id = $cart->food->restaurant_id;
        $sum_order = Cart::where('client_id', auth()->user()->id)->sum('sum_price');

        Order::create([
            'restaurant_id' => $restaurant_id,
            'client_id' => auth()->user()->id,
            'order' => $order,
            'sum_order' => $sum_order
        ]);

        Cart::where('client_id', auth()->user()->id)->delete();

        return redirect(route('client.order'));
    }

    public function destroy()
    {
        $order = Order::where('client_id', auth()->user()->id)->first();

        if (! $order) {
            return back()->with('message', 'no order to cancel');
        }

        if ($order->is_active == true) {
            return back()->with('message', 'Order accepted you can\'t cancel it');
        }

        $order->delete();

        return redirect(route('client.index'))->with('message', 'Canceled successfully');
    }

    public function index()
    {
        return view('client.oldOrders' , [
            'orders' => OldOrder::latest()->with('restaurant', 'delivery')->paginate()
        ]);
    }
}
