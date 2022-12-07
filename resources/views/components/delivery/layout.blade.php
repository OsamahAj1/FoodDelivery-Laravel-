<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <x-bootstrap.css />
    @vite(['resources/js/delivery/App.js', 'resources/css/DeliveryStyles.css'])
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light b">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('delivery.index') }}">Food Delivery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @auth
                        <a class="nav-link active" href="{{ route('delivery.order') }}">Order</a>
                        <a class="nav-link active" href="{{ route('delivery.oldOrders') }}">Old orders</a>
                        <x-user-name />
                        <x-form.logout logout='delivery.logout' btn='b' />
                    @else
                        <x-home />
                        <x-register-login login='delivery.login' register='delivery.register' />
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div>
        {{ $slot }}
    </div>
    <x-bootstrap.js />
</body>

</html>
