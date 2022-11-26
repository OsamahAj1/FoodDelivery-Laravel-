@props(['type'])
@if (session($type))
<h2 class="text-info mb-3 mt-3 text-center">{{ session($type) }}</h2>
@endif
