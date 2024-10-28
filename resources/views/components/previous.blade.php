@props([
    'route' => null
])

<a href="{{ $route ?? url()->previous() }}">
    {{__('Назад')}}
</a>
