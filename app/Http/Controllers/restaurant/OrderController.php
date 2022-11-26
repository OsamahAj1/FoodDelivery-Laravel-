<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Models\OldOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('restaurant.index', [
            'orders' => Order::where('restaurant_id', auth()->user()->id)
                ->where('is_active', true)
                ->with('delivery')
                ->get(),
        ]);
    }

    public function oldOrdersIndex()
    {
        return view('restaurant.oldOrders', [
            'orders' => OldOrder::latest()->with('delivery')->paginate()
        ]);
    }
}
