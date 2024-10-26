@extends('layouts.main')

@section('page.title', 'Страница блога')
@section('main.content')
    <x-title>
        Список постов
    </x-title>

    @include('components.blog.filter')

    <div class="row">
        @if(empty($posts))
            <div class="row ms-1">
                {{__('Нет ни одного поста')}}
            </div>
        @else
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-12 col-md-4">
                        <x-post.card :post="$post" />
                    </div>

                @endforeach
            </div>
        @endif

        {{ $posts->links() }}
    </div>
@endsection
