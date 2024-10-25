@props([
    'action' => '',
    'method' => 'POST'
])
<form {{ $attributes }} method="{{ $method }}" action="{{ $action }}">
    @unless($method == 'GET')
        @csrf
    @endif
    @method(strtoupper($method))

    {{ $slot }}
</form>
