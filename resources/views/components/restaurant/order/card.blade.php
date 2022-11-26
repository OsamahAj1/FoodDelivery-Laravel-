@props(['order'])

<div class="order-row row">

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <p>{{ $order->id }}</p>
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <p class="text-break">Delivery: {{ $order->delivery->name }}</p>
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto fs-3">
        <p class="text-break">{{ $order->order }}</p>
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <p>@usd($order->sum_order)</p>
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <button class="ready-btn btn btn-danger">Ready</button>
    </div>

</div>
