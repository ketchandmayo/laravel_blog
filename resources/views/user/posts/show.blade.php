@extends('layouts.main')

@section('page.title', $post->title)
{{--comment--}}
@section('main.content')
    <x-title>
        {{$post->title}}

        <x-slot name="link">
            <a href="{{route('user.posts')}}">
                {{__('Назад')}}
            </a>
        </x-slot>

        <x-slot name="right">
            <x-button-link href="{{route('user.posts.edit', $post->id)}}">
                Редактировать пост
            </x-button-link>
        </x-slot>

    </x-title>

    {!! $post->content !!}
    <div class="small text-muted mt-3">
        {{ now()->format('d.m.Y H:i') }}
    </div>

@endsection
