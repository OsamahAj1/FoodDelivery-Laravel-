<x-restaurant.layout>
    <x-slot name='title'>
        Home
    </x-slot>

    <x-flash type='message' />

    <input type="hidden" id="res-id" value="{{ auth()->user()->id }}">
    <p class="text-center fs-3 mb-4" id="orders-wait">Searching for orders</p>

    <div class="container mt-5 text-center" id="orders">

        @if ($orders->count())
            <x-restaurant.order.grid :orders="$orders" />
        @endif

    </div>

</x-restaurant.layout>
