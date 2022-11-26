@props(['orders'])

@foreach ($orders as $order)
    <x-restaurant.order.card :order="$order" />
@endforeach
