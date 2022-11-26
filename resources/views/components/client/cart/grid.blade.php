@props(['carts'])

@foreach ($carts as $cart)
<x-client.cart.card :cart="$cart" />
@endforeach
