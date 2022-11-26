<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cart = Cart::where('client_id', auth()->user()->id);

        return view('client.cart', [
            'carts' => $cart->with('food')->get(),
            'sum' => $cart->sum('sum_price')
        ]);
    }

    public function store(int $food_id, int $number)
    {
        if ($food_id <= 0 || $number <= 0) {
            return response()->json(['error' => 'Number must be bigger than 0'], 400);
        }

        if (!$food = Food::find($food_id)) {
            return response()->json(['error' => 'Error2'], 400);
        }

        $response = Cart::addToCart($food, $number);

        return response()->json($response['data'], $response['status']);
    }

    public function update(int $cart_id, int $number)
    {
        if ($cart_id <= 0 || $number <= 0) {
            return response()->json(['error' => 'Number must be bigger than 0'], 400);
        }

        if (!$cart = Cart::find($cart_id)) {
            return response()->json(['error' => 'Error'], 400);
        }

        $cart->updateCart($number);

        $cart_info = Cart::where('client_id', auth()->user()->id);

        return response()->json([
            'success' => 'Update Successfully',
            'sum_price' => $cart->sum_price,
            'sum_cart' => $cart_info->sum('sum_price'),
            'cart_count' => $cart_info->sum('number'),
        ], 201);
    }

    public function destroy(int $cart_id)
    {
        if ($cart_id <= 0) {
            return response()->json(['error' => 'Error1'], 400);
        }

        if (!$cart = Cart::find($cart_id)) {
            return response()->json(['error' => 'Error2'], 400);
        }

        $cart->delete();

        $cart_info = Cart::where('client_id', auth()->user()->id);

        return response()->json([
            'success' => 'deleted successfully',
            'sum_cart' => $cart_info->sum('sum_price'),
            'cart_count' => $cart_info->sum('number'),
        ], 201);
    }
}
