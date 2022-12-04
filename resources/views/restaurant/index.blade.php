<x-restaurant.layout>
    <x-slot name='title'>
        Home
    </x-slot>

    <x-flash type='message' />

    <div id="app" class="container mt-5 text-center">
        <orders
        :orders="{{ json_encode($orders) }}"
        :restaurant-id="{{ auth()->user()->id }}"
        />
    </div>

</x-restaurant.layout>
