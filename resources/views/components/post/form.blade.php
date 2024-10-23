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

    <x-form-item>
        <x-label required>{{__('Дата публикации')}}</x-label>
        <x-input name="published_at" value="" placeholder="11.12.2024" />
        <x-error name="published_at" />
    </x-form-item>

    <x-form-item>
        <x-checkbox name="published">
            {{__('Опубликовано')}}
        </x-checkbox>
        <x-error name="published" />
    </x-form-item>

{{--    @include('includes.errors')--}}

    {{ $slot }}
</x-form>
