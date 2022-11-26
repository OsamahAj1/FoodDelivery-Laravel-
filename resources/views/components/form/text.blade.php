@props(['name', 'label'])
<div class="form-floating mb-3">
    <textarea class="form-control @error($name) is-invalid @enderror" id="{{ $name }}"
        style="height: 100px" placeholder="{{ $name }}" name="{{ $name }}" required>{{ old($name) }}</textarea>

    <label for="{{ $name }}">
        @error($name)
            {{ $message }}
        @else
            {{ ucwords($label) }}
        @enderror
    </label>
</div>
