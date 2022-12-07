<x-client.layout-tailwind>
    <x-slot name='title'>
        Cart
    </x-slot>

    <x-flash type='message' />

    <div id="app">

        <cart
        :carts="{{ json_encode($carts) }}"
        :sum="{{ $sum }}"
        :index-route="'{{ route('client.index') }}'"
        :place-route="'{{ route('client.placeOrder') }}'"
        :url="'{{ asset('storage') }}'"
        :csrf="'{{ csrf_token() }}'"
        />

    </div>

</x-client.layout-tailwind>
