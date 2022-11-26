<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function create()
    {
        return view('restaurant.createFood');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
            'des' => ['required', 'min:10', 'max:255'],
            'image' => ['required', 'image']
        ]);

        $attributes['restaurant_id'] = auth()->user()->id;
        $attributes['image'] = request()->file('image')->store('food_images');

        Food::create($attributes);

        return redirect(route('restaurant.index'))->with('message', 'Added Successfully');
    }
}
