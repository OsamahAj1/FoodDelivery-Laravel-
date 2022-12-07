<x-client.layout-tailwind>
    <x-slot name="title">
        {{ $restaurant->name }}
    </x-slot>

    <div class="grid mb-14 gap-y-4 justify-items-center">
        <img src="{{ asset('storage/' . $restaurant->image) }}" class="w-56 h-full">
        <h1 class="text-4xl">{{ $restaurant->name }}</h1>
        <p class="text-lg">{{ $restaurant->des }}</p>
    </div>

    <div id="app">
        <restaurant-foods :foods="{{ json_encode($restaurant->foods) }}" :url="'{{ asset('storage') }}'" />
    </div>

</x-client.layout-tailwind>
