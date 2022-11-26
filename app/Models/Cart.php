<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class Cart extends Model
{
    use HasFactory;

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public static function addToCart(Food $food, int $number): array
    {
        $sum_price = $food->price * $number;
        $client_id = auth()->user()->id;

        $cart = Cart::where('client_id', $client_id)->first();

        // if cart is empty add to cart
        if (!$cart) {
            Cart::create([
                'client_id' => $client_id,
                'food_id' => $food->id,
                'number' => $number,
                'sum_price' => $sum_price
            ]);
            return ['data' => ['success' => 'Added Successfully'], 'status' => 201];
        }

        // if food in cart update number and sum
        elseif ($in_cart = Cart::where('food_id', $food->id)->first()) {
            $in_cart->number = $in_cart->number + $number;
            $in_cart->sum_price = $in_cart->sum_price + $sum_price;
            $in_cart->save();
            return ['data' => ['success' => 'Added Successfully'], 'status' => 201];
        }

        // if new food make sure it's from same restaurant
        else {
            if ($cart->food->restaurant_id !== $food->restaurant_id) {
                return ['data' => ['error' => 'All foods in cart must be from the same restaurant.'], 'status' => 400];
            } else {
                Cart::create([
                    'client_id' => $client_id,
                    'food_id' => $food->id,
                    'number' => $number,
                    'sum_price' => $sum_price
                ]);
                return ['data' => ['success' => 'Added Successfully'], 'status' => 201];
            }
        }
    }

    public function updateCart(int $number)
    {
        $sum_price = $this->food->price * $number;

        $this->sum_price = $sum_price;
        $this->number = $number;
        $this->save();
    }
}
