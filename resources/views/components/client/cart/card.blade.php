@props(['cart'])

<div class="cart-item row mb-4" id="cart-item-{{ $cart->id }}">

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <img src="{{ asset('storage/' .$cart->food->image) }}" class="im-size">
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <p>{{ $cart->food->name }}</p>
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <p>@usd($cart->food->price)</p>
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <p id="sum-price-{{ $cart->id }}">@usd($cart->sum_price)</p>
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <div>
            <input type="hidden" value="{{ $cart->id }}">
            <input type="number" class="update-number-input btn text-center" min="1" value="{{ $cart->number }}">
            <p></p>
        </div>
    </div>

    <div class="col col-lg-2 col-sm-auto col-xs-auto">
        <div>
            <input type="hidden" value="{{ $cart->id }}">
            <input type="button" class="remove-button btn btn-danger" value="Remove">
            <p></p>
        </div>
    </div>
</div>
