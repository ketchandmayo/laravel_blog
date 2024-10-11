@props([
    'color' => 'primary',
    'size' => 'md',
    'bootstrap' => '',
])

<a {{$attributes}}>
    <x-button color="{{ $color }}" size="{{ $bootstrap }}" bootstrap="{{ $bootstrap }}">
        {{ $slot }}
    </x-button>
</a>
