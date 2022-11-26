@props(['foods'])
@foreach ($foods as $food)
    <x-client.food.card :food="$food" />
@endforeach
