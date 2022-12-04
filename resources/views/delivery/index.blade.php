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


    {{-- <p id='error' class="text-center text-danger"></p>
    <div class="container mt-5" id="orders">

        @if ($orders->count())
            <x-delivery.order.grid :orders="$orders"/>
        @endif

        <input type="hidden" value="{{ auth()->user()->id }}" id="del-id">
        <input type="hidden" value="{{ auth()->user()->name }}" id="del-name">
        <input type="hidden" value="{{ auth()->user()->image }}" id="del-img">
        <input type="hidden" value="{{ auth()->user()->car }}" id="del-car">
        <input type="hidden" value="{{ auth()->user()->number }}" id="del-number">
    </div> --}}
</x-delivery.layout>
