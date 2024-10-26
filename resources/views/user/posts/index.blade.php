@extends('layouts.main')

@section('page.title', 'Мои посты')
@section('main.content')
    <x-title>
        {{__('Мои посты')}}

        <x-slot name="right">
            <x-button-link href="{{route('user.posts.create')}}">
                {{__('Создать пост')}}
            </x-button-link>
        </x-slot>
    </x-title>

    <div class="row">
        @if(empty($posts))
            <div class="row ms-1">
                {{__('Нет ни одного поста')}}
            </div>
        @else
            @foreach($posts as $post)
                    <div class="mb-5">
                        <h2 class="h6 m-0">
                            <a href="{{ route('user.posts.show', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </h2>

                        @if($post->published_at)
                            <div class="small text-muted">
                                {{ $post->published_at->diffForHumans() }}
                            </div>
                        @endif
                    </div>
            @endforeach
            {{ $posts->links() }}
        @endif
    </div>
@endsection
