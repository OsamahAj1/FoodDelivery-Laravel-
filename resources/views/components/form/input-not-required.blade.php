@props(['name', 'type', 'label', 'value' => null])
<div class="form-floating mb-3">
    <input class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ $name }}" name="{{ $name }}" type="{{ $type }}">

    <label for="{{ $name }}">
        @error($name)
        {{ $message }}
        @else
        {{ ucwords($name) }}
        @enderror
    </label>
</div>
