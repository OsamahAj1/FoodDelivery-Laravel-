<!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
<!-- He who is contented is rich. - Laozi -->
<!-- Life is available only in the present moment. - Thich Nhat Hanh -->
<a href="{{ route('client.cart') }}" class="p-2 me-2">
    <button type="button" class="btn btn-light position-relative rounded-pill">
        <img src="{{ asset('client/cart.png') }}" class="img-fluid cart">
        <span id="cart"
        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $cart }}</span>
    </button>
</a>
