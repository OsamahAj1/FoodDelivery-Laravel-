<x-client.layout>
    <x-slot name="title">
        {{ $restaurant->name }}
    </x-slot>

    <div class="container mt-5">

        <div class="row mb-4 text-center">
            <img src="{{ asset('storage/' . $restaurant->image) }}" class="im-size2 rounded mx-auto d-block mb-3">
            <h2>{{ $restaurant->name }}</h2>
            <p class="text-break mt-2 fs-5">{{ $restaurant->des }}</p>
        </div>

        <div id="app" class="row row-cols-lg-2 row-cols-sm-1">
            <restaurant-foods
            :foods="{{ json_encode($restaurant->foods->where('is_active', true)) }}"
            :url="'{{ asset('storage') }}'"
            />
        </div>
    </div>
</x-client.layout>
