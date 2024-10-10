@props([
    'name' => 'test',
    'value' => '',
])
<input id="{{$name}}" value="{!! $value !!}" type="hidden" name="{{$name}}">
<trix-editor input="{{$name}}"></trix-editor>

@once
    @push('js')
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    @endpush

    @push('css')
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    @endpush
@endonce
