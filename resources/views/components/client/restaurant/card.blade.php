@props(['restaurant'])
<div class="col p-4 text-center">
    <a href="{{ route('client.restaurant', ['user' => $restaurant->name]) }}"><img src="{{ asset( 'storage/' . $restaurant->image) }}" class="mb-3 im-size"></a>
    <p><a href="{{ route('client.restaurant', ['user' => $restaurant->name]) }}" class="a fs-3">{{ $restaurant->name }}</a></p>
    <p class="text-break mb-2">{{ $restaurant->des }}</p>
    <p class="fw-light text-break">{{ $restaurant->address }}</p>
</div>
