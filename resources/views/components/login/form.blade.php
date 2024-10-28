<x-auth>
    <x-card>
        <x-card-header>
            <div class="d-flex justify-content-between">
                <div>
                    <x-card-title>
                        {{__('Вход')}}
                    </x-card-title>
                </div>
                <div>
                    <a href="{{route('register')}}">
                        {{__('Регистрация')}}
                    </a>
                </div>
            </div>
        </x-card-header>

        <x-card-header>
            <x-form id="login-form" action="{{ route('login.store') }}" method="POST">
                <x-form-item>
                    <x-label required>{{__('Email')}}</x-label>
                    <x-input type="email" name="email" autofocus required />
                    <x-error name="email" />
                </x-form-item>
                <x-form-item>
                    <x-label>{{__('Пароль')}}</x-label>
                    <x-input type="password" name="password" />
                    <x-error name="password" />
                </x-form-item>
                <x-form-item>
                    <x-checkbox name="remember">
                        {{__('Запомнить меня')}}
                    </x-checkbox>
                    <x-error name="remember" />
                </x-form-item>
                <x-button type="submit" color="success">
                    {{__('Войти')}}
                </x-button>
            </x-form>
        </x-card-header>
    </x-card>
</x-auth>

@push('js')
    <script type="module">
        ajaxRedirectForm('login-form', '{{ route('login.store') }}')
    </script>
@endpush
