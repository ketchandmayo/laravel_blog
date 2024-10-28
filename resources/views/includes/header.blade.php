<nav class="navbar navbar-expand-md navbar-light border-bottom">
    <div class="container">
        <a href="{{route('home')}}" class="navbar-brand">
            {{config('app.name')}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link {{active_link('home*')}}" aria-current="page">
                        {{ __('Главная') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('blog')}}" class="nav-link {{active_link('blog*')}}" aria-current="page">
                        {{ __('Блог') }}
                    </a>
                </li>
            </ul>

            @auth()
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a href="{{route('user.posts')}}" class="nav-link {{active_link('user*')}}" aria-current="page">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <x-form id="logout-form" action="{{ route('logout') }}">
                            <button type="submit" class="nav-link">
                                {{ __('Выйти') }}
                            </button>
                        </x-form>
                    </li>
                </ul>
                @push('js')
                    <script type="module">
                        ajaxRedirectForm('logout-form', '{{ route('logout') }}')
                    </script>
                @endpush
            @endauth

            @guest()
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a href="{{route('login')}}" class="nav-link {{active_link('login*')}}" aria-current="page">
                            {{ __('Вход') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link {{active_link('register*')}}" aria-current="page">
                            {{ __('Регистрация') }}
                        </a>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>
