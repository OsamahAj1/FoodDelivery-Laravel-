<div class="flex md:flex md:flex-grow flex-row justify-end">
    <a href="{{ route('client.cart') }}" class="mx-2 me-2">
        <button type="button" class="inline-flex relative p-3">
            <img src="{{ asset('client/cart.png') }}" class="img-fluid cart">
            <div id="cart"
                class="inline-flex absolute -top-2 -right-2 justify-center items-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white">
                {{ $cart }}</div>
        </button>
    </a>
</div>
