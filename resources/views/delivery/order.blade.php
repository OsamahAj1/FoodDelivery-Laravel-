<x-delivery.layout>
    <x-slot name="title">
        Order
    </x-slot>


    @if ($order)
        <div class="container mt-3 text-center fs-4">

            <div class="row">
                <img src="{{ asset('storage/' . $order->restaurant->image) }}" class="im-size rounded mx-auto d-block">
            </div>

            <div class="row">
                <p>{{ $order->restaurant->name }}</p>
            </div>

            <div class="row">
                <p class="text-break">{{ $order->order }}</p>
            </div>

            <div class="row">
                <p><span class="text-info">Restaurant Address:</span> {{ $order->restaurant->address }}</p>
            </div>

            <div class="row">
                <p><span class="text-info">Client Address:</span> {{ $order->client->address }} </p>
            </div>

            <div class="row">
                <p>@usd($order->sum_order)</p>
            </div>

            <div class="row">

                <p class="text-info  mb-3">Call the client when you get to address to deliver the food.</p>

                <p class="text-warning  fs-3 mb-2">Warning: only press this button if the food delivered to client.</p>

                <form action="{{ route('delivery.destroyOrder', ['order' => $order->id]) }}" method="post">
                    @csrf
                    <input type="submit" class="btn btn-success " value="Delivered">
                </form>

            </div>

        </div>
    @else
        <h3 class="text-center text-info mt-5">No live order go to <a href="{{ route('delivery.index') }}">All orders</a>
            to get order.</h3>
    @endif

</x-delivery.layout>
