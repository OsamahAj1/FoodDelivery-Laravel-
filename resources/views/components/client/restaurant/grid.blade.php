@props(['restaurants'])
@foreach ($restaurants as $restaurant)

<x-client.restaurant.card :restaurant="$restaurant" />

@endforeach
