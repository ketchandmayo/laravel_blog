@props([
    'method' => 'GET'
])
<form {{ $attributes }} method="{{ $method }}">
    @unless($method == 'GET')
        @csrf
    @endif

    {{ $slot }}
</form>
