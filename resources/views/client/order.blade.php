<x-client.layout>
    <x-slot name='title'>
        Live Order
    </x-slot>
    @if ($order)

        <div class="container mt-5" id="order">

            <div class="row">
                <p class="text-center fs-3" id="order-status-wait">Please wait finding delivery person</p>
            </div>

            <x-client.order.delivery-card :order="$order" />

        </div>

        <p id="message" class="text-success text-center fs-4"></p>



        <input type="hidden" value="{{ $order->id }}" id="order_id">

        @if ($order->is_sent == false)
            <input type="hidden" value="{{ $order->client->address }}" id="client-adr">
            <input type="hidden" value="{{ $order->restaurant->address }}" id="res-adr">
            <input type="hidden" value="{{ $order->restaurant->id }}" id="res-id">
            <div class="text-center mt-4"><button class="btn btn-success" id="send-btn">Send Order</button></div>
        @endif

        @if ($order->is_active == false)
            <input type="hidden" id="not-active">

            <form id="cancel-order-form" action="{{ route('client.destroyOrder') }}" class="text-center mt-4"
                method="post">
                @csrf
                <input type="submit" class="btn btn-danger" value="Cancel order">
            </form>
            <h3 class="text-center text-warning mt-5">Warning: You can't cancel order if order got accepted.</h3>
        @endif
        <x-flash type='message' />
        <div class="container mt-5">
            <div class="row">
                <p class="text-info text-center fs-3">You gonna get call from delivery person when he get to your
                    address.
                </p>
            </div>

            <x-client.order.card :order="$order" />

        </div>
    @else
        <h3 class="text-center text-info mt-5">No live order go to <a href="{{ route('client.index') }}">home page</a>
            to
            order.
        </h3>

    @endif
</x-client.layout>
