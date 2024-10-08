@extends('layouts.base')

@section('page.title', 'Страница блога')
@section('content')
    <h1>
        Список постов
    </h1>

    @if(empty($posts))
        Нет ни одного поста
    @else
        @foreach($posts as $post)
            <div class="mb-4">
                <h5>
                    <a href="{{route('blog.show', $post->id)}}">
                        {{$post->title}}
                    </a>
                </h5>
                <p>
                    {!! $post->content !!}
                </p>
            </div>
        @endforeach
    @endif

@endsection
