<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <x-bootstrap.css />
    @vite(['resources/js/client/App.js', 'resources/css/ClientStyles.css'])
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('client.index') }}">Food Delivery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @auth
                        <a class="nav-link active" href="{{ route('client.order') }}">Live order</a>
                        <a class="nav-link active" href="{{ route('client.oldOrders') }}">Old orders</a>
                        <x-user-name />
                        <x-admin />
                        <x-form.logout logout='client.logout' btn='btn btn-light'/>
                    @else
                        <x-home />
                        <x-register-login login='client.login' register='client.register' />
                    @endauth
                </div>
            </div>
            @auth
                <x-client.cart.count />
            @endauth
        </div>
    </nav>
    <div>
        {{ $slot }}
    </div>
    <x-bootstrap.js />
</body>
