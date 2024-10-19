@props([
  'value' => ''
])

<input {{ $attributes }} type="text" value="{{ old($attributes->get('name')) ?? $value }}" class="form-control" />
