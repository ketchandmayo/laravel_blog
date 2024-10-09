@props([
    'name' => 'test',
])

<input id="{{$name}}" type="hidden" name="{{$name}}">
<trix-editor input="{{$name}}"></trix-editor>

@push('js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
@endpush
