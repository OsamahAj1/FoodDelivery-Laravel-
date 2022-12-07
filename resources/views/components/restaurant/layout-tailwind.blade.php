<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <x-tailwind />
    @vite(['resources/js/restaurant/App.js', 'resources/css/RestaurantStyles.css'])
</head>

<body>

        <nav class="p-3 bg-amber-200">
        <div class="flex md:flex md:flex-grow flex-row justify-start">
            <a href="{{ route('restaurant.index') }}"
                class="font-normal text-xl px-1 mr-3 py-2"
                >Food Delivery</a>

            <a href="{{ route('restaurant.oldOrders') }}"
                class="font-normal pt-3 px-2 py-2"
                >Old orders</a>

            <a class="font-bold pt-3 px-2 py-2"
                >{{ auth()->user()->name }}</a>


            <form action="{{ route('restaurant.logout') }}">
                <button type="submit"
                class="font-normal pt-3 px-2 py-2 border-none"
                >Logout</button>
            </form>
        </div>
    </nav>
    <div>
        {{ $slot }}
    </div>
</body>

</html>
