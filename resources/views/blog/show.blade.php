@extends('layouts.main')

@section('page.title', $post->title)
{{--comment--}}
@section('main.content')
    <x-title>
        {{$post->title}}

        <x-slot name="link">
            <a href="{{route('blog')}}">
                {{__('Назад')}}
            </a>
        </x-slot>
    </x-title>

    {!! $post->content !!}

@endsection
