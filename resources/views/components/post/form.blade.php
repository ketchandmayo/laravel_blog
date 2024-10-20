@props([
    'action' => '',
    'method' => 'POST',
    'post' => (object)[
        'title' => '',
        'content' => '',],
])

{{ session('message') }}

<x-form action="{{ $action }}" method="POST">
    @unless($method == 'GET')
        @csrf
    @endif
    @method(strtoupper($method))
    <x-form-item>
        <x-label required>{{__('Название поста')}}</x-label>
        <x-input name="title" value="{{$post->title ?? ''}}" autofocus />
        <x-error name="title" />
    </x-form-item>

    <x-form-item>
        <x-label required>{{__('Содержание поста')}}</x-label>
        <x-trix name="content" value="{!! $post->content ?? '' !!}"></x-trix>
        <x-error name="content" />
    </x-form-item>

{{--    @include('includes.errors')--}}

    {{ $slot }}
</x-form>
