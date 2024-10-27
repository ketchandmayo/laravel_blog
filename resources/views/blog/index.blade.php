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
            <div id="blog-posts-container">
                @include('blog.partials_index', ['posts' => $posts])
            </div>

        @endif
    </div>
@endsection
@push('js')
    <script type="module">
        ajaxPaginateRequest('blog-posts-container')
    </script>
@endpush
