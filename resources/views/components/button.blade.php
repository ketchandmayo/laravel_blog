@props([
    'color' => 'primary',
    'size' => 'md',
])
<button {{$attributes->merge(['type' => 'button'],)}} class="btn btn-{{$color}} btn-{{$size}}">
    {{ $slot }}
</button>
