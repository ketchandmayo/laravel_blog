@extends('layouts.main')

@section('page.title', 'Редактировать пост')
@section('main.content')
    <x-title>
        {{__('Редактировать пост')}}

        <x-slot name="link">
            <a href="{{route('user.posts.show', $post->id)}}">
                {{__('Назад')}}
            </a>
        </x-slot>
    </x-title>

    <x-post.form action="{{route('user.posts.update', $post->id)}}" method="PUT" :post="$post" />
@endsection
