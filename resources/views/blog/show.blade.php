@extends('layouts.main')

@section('page.title', $post->title)
{{--comment--}}
@section('main.content')
    <x-title>
        {{$post->title}}

        <x-slot name="link">
            <x-previous />
        </x-slot>
    </x-title>

    {!! $post->content !!}

@endsection
