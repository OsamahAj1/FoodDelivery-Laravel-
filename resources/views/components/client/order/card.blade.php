@props(['order'])

<div class="cart-item row mb-4">

    <div class="col col-lg-3 col-sm-auto col-xs-auto">
        <img src="{{ asset('storage/' . $order->restaurant->image) }}" class="im-size" id="res-img">
    </div>

    <div class="col col-lg-3 col-sm-auto col-xs-auto">
        <p id="res-name">{{ $order->restaurant->name }}</p>
    </div>

    <div class="col col-lg-3 col-sm-auto col-xs-auto">
        <p class="mt-5 text-break" id="order-order">{{ $order->order }}</p>
    </div>

    <div class="col col-lg-3 col-sm-auto col-xs-auto">
        <p id="sum-order">@usd($order->sum_order)</p>
    </div>
</div>
