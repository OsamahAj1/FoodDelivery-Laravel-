<x-client.layout>
    <x-slot name="title">
        {{ $restaurant->name }}
    </x-slot>

    <div class="container mt-5">

        <div class="row mb-4 text-center">
            <img src="{{ asset('storage/' . $restaurant->image) }}" class="im-size2 rounded mx-auto d-block mb-3">
            <h1>{{ $restaurant->name }}</h1>
            <p class="text-break mt-2 fs-4">{{ $restaurant->des }}</p>
        </div>

        <div class="row row-cols-lg-2 row-cols-sm-1">

            @if ($restaurant->foods->count())
            <x-client.food.grid :foods="$restaurant->foods" />
            @else
                <p class="text-info text-center">No Foods</p>
            @endif

        </div>
    </div>
</x-client.layout>
