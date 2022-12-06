<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <x-tailwind />
    @vite(['resources/js/client/App.js', 'resources/css/ClientStyles.css'])
</head>

<body>
    <nav class="p-3 bg-gray-50">
        <div class="flex md:flex md:flex-grow flex-row justify-start">
            <a href="{{ route('client.index') }}"
                class="font-normal text-xl px-1 mr-3 py-2"
                >Food Delivery</a>

            <a href="{{ route('client.order') }}"
                class="font-normal pt-3 px-2 py-2"
                >Live order</a>

            <a href="{{ route('client.oldOrders') }}"
                class="font-normal pt-3 px-2 py-2"
                >Old orders</a>

            <a class="font-bold pt-3 px-2 py-2"
                >{{ auth()->user()->name }}</a>


            <form action="{{ route('client.logout') }}">
                <button type="submit"
                class="font-normal pt-3 px-2 py-2 border-none"
                >Logout</button>
            </form>

            <x-client.cart.count-tailwind />
        </div>
    </nav>
    <div>
        {{ $slot }}
    </div>
</body>
