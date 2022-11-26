<x-client.layout>
    <x-slot name='title'>
        Old Orders
    </x-slot>
    <div class="container mt-5">
        @if ($orders->count())
            <x-client.oldOrders.grid :orders="$orders" />

            {{ $orders->links() }}
        @else
            <h3 class="text-center text-info">No orders go to <a href="{{ route('client.index') }}">home page</a> to
                order.</h3>
        @endif
    </div>
</x-client.layout>
