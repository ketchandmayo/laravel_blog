@props([
    'id' => uuid_create(),
    'name' => '',
])

<x-input name="{{ $name }}" type="text" id="{{ $id }}" class="form-control" {{ $attributes }}/>

@push('js')
    <script type="module">
        $(document).ready(function() {
            $('#{{ $id }}').datepicker({
                format: "dd.mm.yyyy",
                language: "{{ app()->currentLocale() }}",
                todayHighlight: true,
                toggleActive: true,
            });
        });
    </script>
@endpush
