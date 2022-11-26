@props(['image'])
<div {{ $attributes(['class' => 'carousel-item']) }}>

    <img src="{{ $image }}" class="im-index d-block w-100" alt="index image">

    <div class="carousel-caption d-none d-md-block">

        <div class="mt-4">
            <h3 class="mb-3">Start ordering food</h3>
            <div>
                <span class="me-3">
                    <a href="{{ route('client.register') }}" class="btn btn-success">Create new account</a>
                </span>
                Or
                <span class="ms-3">
                    <a href="{{ route('client.login') }}" class="btn btn-success">Login</a>
                </span>
            </div>
        </div>

        <div class="mt-4">
            <h3 class="mb-3">If you have restaurant</h3>
            <div>
                <span class="me-3">
                    <a href="{{ route('restaurant.register') }}" class="btn btn-success">Register restaurant</a>
                </span>
                Or
                <span class="ms-3">
                    <a href="{{ route('restaurant.login') }}" class="btn btn-success">Login</a>
                </span>
            </div>
        </div>

        <div class="mt-4">
            <h3 class="mb-3">If you are interesting in deliver</h3>
            <div>
                <span class="me-3">
                    <a href="{{ route('delivery.register') }}" class="btn btn-success">Create new account</a>
                </span>
                Or
                <span class="ms-3">
                    <a href="{{ route('delivery.login') }}" class="btn btn-success">Login</a>
                </span>
            </div>
        </div>

    </div>
</div>
