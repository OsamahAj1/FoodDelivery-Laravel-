<x-restaurant.layout>
    <x-slot name='title'>
        Old Orders
    </x-slot>
    <div class="container text-center mt-5">
        @if ($orders->count())
        <x-restaurant.oldOrders.grid :orders="$orders" />

        {{ $orders->links() }}
        @else
        <h3 class="text-center text-info">No Orders.</h3>
        @endif
    </div>
</x-restaurant.layout>
