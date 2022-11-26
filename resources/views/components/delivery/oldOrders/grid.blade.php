@props(['orders'])

@foreach ($orders as $order)
<x-delivery.oldOrders.card :order="$order" />
@endforeach
