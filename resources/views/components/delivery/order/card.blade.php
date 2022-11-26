@props(['order'])

<div class="row order-row">
    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <img class="im-size" src="{{ asset('storage/' . $order->restaurant->image) }}">
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <p>{{ $order->restaurant->name }}</p>
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <p class="text-break"><span class="text-info">FROM: </span>{{ $order->restaurant->address }}.<span
                class="text-info">TO: </span> {{ $order->client->address }} </p>
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <p class="text-break" id="order-order-{{ $order->id }}">{{ $order->order }}</p>
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <p id="sum-order-{{ $order->id }}">@usd($order->sum_order)</p>
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <button type="submit" class="accept-btn btn btn-success" data-order="{{ $order->id }}"
            data-res="{{ $order->restaurant->id }}">Accept</button><span class="text-danger ms-3 fs-3"></span>
    </div>
</div>
