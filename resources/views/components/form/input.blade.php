@props(['name', 'type', 'label', 'value' => null, 'accept' => '', 'step' => ''])
<div class="form-floating mb-3">
    <input class="form-control @error($name) is-invalid @enderror" id="{{ $name }}"
        value="{{ old($name, $value) }}" placeholder="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
        accept="{{ $accept }}" step="{{ $step }}" required>

    <label for="{{ $name }}">
        @error($name)
            {{ $message }}
        @else
            {{ ucwords($label) }}
        @enderror
    </label>
</div>
