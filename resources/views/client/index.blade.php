<x-client.layout>
    <x-slot name="title">
        Restaurants
    </x-slot>

    <x-flash type='message' />

    <div class="container mt-5">
        <div class="row row-cols-lg-3 row-cols-sm-1">
            @if ($restaurants->count())
            <x-client.restaurant.grid :restaurants="$restaurants"/>

            {{ $restaurants->links() }}
            @else
            <p class="test-info text-center fs-1">No Restaurants.</p>
            @endif
        </div>
    </div>
</x-client.layout>
