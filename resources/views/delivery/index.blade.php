<x-delivery.layout>
    <x-slot name='title'>
        Orders
    </x-slot>

    <x-flash type='message'/>

    <div id="app" class="container mt-5">
        <orders
        :orders="{{ json_encode($orders) }}"
        :url="'{{ asset('storage') }}'"
        :delivery="{{ json_encode(auth()->user()) }}"
        />
    </div>
</x-delivery.layout>
