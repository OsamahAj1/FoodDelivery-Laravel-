@props(['order'])

<div class="row" id="delivery-info">

    <div class="col col-lg-3 col-sm-auto col-xs-auto">
        <img src="{{ $order->delivery->image ?? false ? asset('storage/'. $order->delivery->image) : '' }}" id="delivery-image" class="im-size">
    </div>

    <div class="col col-lg-3 col-sm-auto col-xs-auto">
        <p id="delivery-name">{{ $order->delivery->name ?? '' }}</p>
    </div>

    <div class="col col-lg-3 col-sm-auto col-xs-auto">
        <p id="delivery-car">{{ $order->delivery->car ?? '' }}</p>
    </div>

    <div class="col col-lg-3 col-sm-auto col-xs-auto">
        <p id="delivery-number">{{ $order->delivery->number ?? '' }}</p>
    </div>

</div>
