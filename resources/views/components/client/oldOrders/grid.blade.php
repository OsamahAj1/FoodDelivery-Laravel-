@props(['orders'])

@foreach ($orders as $order)
    <x-client.oldOrders.card :order="$order"/>
@endforeach
