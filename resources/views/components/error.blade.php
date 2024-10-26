@props([
    'name' => ''
])

@if($errors->has($name))
    <div class="small text-danger pt-1" id="{{ $name }}">
        {{ $errors->first($name) }}
    </div>
@else
    <span class="error small text-danger pt-1" id="{{ $name }}"></span>
@endif
