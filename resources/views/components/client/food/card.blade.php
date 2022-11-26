@props(['food'])

<div class="col p-5 ">
    <img src="{{ asset('storage/' . $food->image) }}" class="im-size mb-3 rounded mx-auto d-block">
    <p class="fs-3">{{ $food->name }}</p>
    <p>@usd($food->price)</p>
    <p class="text-break mb-4">{{ $food->des }}</p>
    <input type="hidden" value="{{ $food->id }}">
    <input type="button" class="add-button btn btn-primary me-3" value="Add to cart">
    <input type="number" class="number-input btn text-center" min="1" value="1">
    <p></p>
    @csrf
</div>