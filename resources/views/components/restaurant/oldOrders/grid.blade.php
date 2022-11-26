@props(['orders'])

@foreach ($orders as $order)
    <x-restaurant.oldOrders.card :order="$order" />
@endforeach
