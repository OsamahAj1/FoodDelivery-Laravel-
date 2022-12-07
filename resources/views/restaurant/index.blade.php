<x-restaurant.layout-tailwind>
    <x-slot name='title'>
        Home
    </x-slot>

    <x-flash type='message' />

    <div id="app">
        <orders
        :orders="{{ json_encode($orders) }}"
        :restaurant-id="{{ auth()->user()->id }}"
        />
    </div>

</x-restaurant.layout-tailwind>
