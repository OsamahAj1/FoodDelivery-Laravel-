<x-client.layout>
    <x-slot name='title'>
        Cart
    </x-slot>

    <div class="container mt-5">

        <div id="empty"></div>
        @if ($carts->count())
            <x-client.cart.grid :carts="$carts" />

            <div id="place-order" class="container">
                <h3 class="text-center mt-5" id="sum-price-cart">@usd($sum)</h3>

                <form class="text-center mb-5 p-4" action="{{ route('client.placeOrder') }}" method="post">
                    @csrf
                    <input type="submit" class="btn btn-outline-primary btn-lg" value="Preview Order">
                </form>
            </div>

            <x-flash type='message' />
        @else
            <h3 class="text-center text-info">Cart is empty go to <a href="{{ route('client.index') }}">home page</a> to
                add foods.</h3>
        @endif
    </div>

</x-client.layout>
