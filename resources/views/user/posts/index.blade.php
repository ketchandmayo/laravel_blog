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
            <div class="user-posts" id="user-posts-container">
                @include('user.posts.partials_index', ['posts' => $posts])
            </div>
        @endif
    </div>
@endsection

@push('js')
    <script type="module">
        ajaxPaginateRequest('user-posts-container')
    </script>
@endpush
