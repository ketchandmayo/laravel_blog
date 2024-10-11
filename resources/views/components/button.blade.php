@props([
    'color' => 'primary',
    'size' => 'md',
    'bootstrap' => '',
])
<button {{$attributes->merge(['type' => 'button'],)}} class="btn btn-{{$color}} btn-{{$size}}{{ ($bootstrap)? ' '.$bootstrap : '' }}">
    {{ $slot }}
</button>
