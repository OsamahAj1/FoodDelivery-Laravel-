<x-delivery.layout>
    <x-slot name='title'>
        Old Orders
    </x-slot>
    <div class="container mt-5">
        @if ($orders->count())
        <x-delivery.oldOrders.grid :orders="$orders" />

        {{ $orders->links() }}
        @else
        <h3 class="text-center text-info">No orders go to <a href="{{ route('delivery.index') }}">home page</a> to
            accept orders.</h3>
        @endif
    </div>
</x-delivery.layout>
