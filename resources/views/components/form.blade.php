@props([
    'action' => '',
    'method' => 'POST'
])
<form {{ $attributes }} method="{{ $method }}" action="{{ $action }}">
    @unless($method == 'GET')
        @csrf
        @method(strtoupper($method))
    @endif
    {{ $slot }}
</form>
