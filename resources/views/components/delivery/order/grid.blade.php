@props(['orders'])

@foreach ($orders as $order)
    <x-delivery.order.card :order="$order"/>
@endforeach
