<x-client.layout>
    <x-slot name='title'>
        Cart
    </x-slot>

    <div id="app" class="container mt-5">

        <x-flash type='message' />

        <cart
        :carts="{{ json_encode($carts) }}"
        :sum="{{ $sum }}"
        :index-route="'{{ route('client.index') }}'"
        :place-route="'{{ route('client.placeOrder') }}'"
        :url="'{{ asset('storage') }}'"
        :csrf="'{{ csrf_token() }}'"
        />
.
    </div>

</x-client.layout>
