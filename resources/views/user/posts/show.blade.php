@extends('layouts.main')

@section('page.title', $post->title)
{{--comment--}}
@section('main.content')
    <x-title>
        {{$post->title}}

        <x-slot name="link">
            <x-previous route="{{ route('user.posts') }}" />
        </x-slot>

        <x-slot name="right">
            <x-button-link href="{{route('user.posts.edit', $post->id)}}">
                Редактировать пост
            </x-button-link>
        </x-slot>

    </x-title>

    {!! $post->content !!}
    <div class="small text-muted mt-3">
        {{ now()->translatedFormat('d F Y') }}
    </div>
    <br>
    <div class="small text-muted mt-3">
        {{ __('Создан: ') }} {{ $post->created_at->translatedFormat('d F Y H:i') }}
    </div>

@endsection
