@props([
    'name' => ''
])

@if($errors->has($name)) @endiferror($name)
    <div class="small text-danger pt-1" id="{{ $name }}">
        {{ $message }}
    </div>
@else
    <span class="error small text-danger pt-1" id="{{ $name }}"></span>
@endif
