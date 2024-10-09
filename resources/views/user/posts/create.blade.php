@extends('layouts.main')

@section('page.title', 'Создать пост')
@section('main.content')
    <x-title>
        {{__('Создать пост')}}

        <x-slot name="link">
            <a href="{{route('user.posts')}}">
                {{__('Назад')}}
            </a>
        </x-slot>
    </x-title>

    <x-form action="{{route('user.posts.store')}}" method="POST">
        <x-form-item>
            <x-label required>{{__('Название поста')}}</x-label>
            <x-input name="title" autofocus />
        </x-form-item>
        <x-form-item>
            <x-label required>{{__('Содержание поста')}}</x-label>
            <x-trix name="content"></x-trix>
        </x-form-item>
        <x-button type="submit" color="success">
            Создать пост
        </x-button>
    </x-form>
@endsection


