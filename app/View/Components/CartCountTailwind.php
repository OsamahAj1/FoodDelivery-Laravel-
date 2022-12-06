<?php

namespace App\View\Components;

use App\Models\Cart;
use Illuminate\View\Component;

class CartCountTailwind extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.cart.count-tailwind', [
            'cart' => Cart::where('client_id', auth()->user()->id)->sum('number')
        ]);
    }
}
