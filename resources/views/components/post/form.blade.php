@props([
    'action' => '',
    'method' => 'POST',
    'post' => (object)[
        'title' =>          '',
        'content' =>        '',
        'published_at' =>   '',
        'published' =>      null,
        ],
])

{{ session('message') }}

<x-form id="post-form" action="{{ $action }}" method="{{ $method }}">
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
        <x-label>{{__('Дата публикации')}}</x-label>
        <x-input name="published_at" value="" value="{{dateOrNull($post->published_at) ?? ''}}" placeholder="{{ now()->format('d.m.Y') }}" />
        <x-error name="published_at" />
    </x-form-item>

    <x-form-item>
        <x-checkbox name="published" checked="{{ checkboxChecked($post->published) }}">
            {{__('Опубликовано')}}
        </x-checkbox>
        <x-error name="published" />
    </x-form-item>

    {{ $slot }}
</x-form>

@push('js')
    <script type="module">
        ajaxRedirectForm('post-form', '{{ $action }}', '{{ $method }}')
    </script>
@endpush
