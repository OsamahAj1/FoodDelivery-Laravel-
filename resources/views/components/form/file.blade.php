@props(['name'])
<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $name }}</label>
    <input class="form-control" type="file" id="{{ $name }}" name="{{ $name }}">
</div>

@error('{{ $name }}')
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
