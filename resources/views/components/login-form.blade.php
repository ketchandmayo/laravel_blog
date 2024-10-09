<x-auth>
    <x-card>
        <x-card-header>
            <x-card-title>
                {{__('Вход')}}
            </x-card-title>
            <div class="d-flex justify-content-between">
                <a href="{{route('register')}}">
                    {{__('Регистрация')}}
                </a>
            </div>
        </x-card-header>
        <x-card-header>
            <x-form action="{{ route('login.store') }}" method="POST">
                <x-form-item>
                    <x-label required>{{__('Email')}}</x-label>
                    <input type="email" name="email" class="form-control" autofocus>
                </x-form-item>
                <x-form-item>
                    <x-label>{{__('Пароль')}}</x-label>
                    <input type="password" name="password" class="form-control">
                </x-form-item>
                <x-form-item>
                    <x-checkbox name="remember">
                        {{__('Запомнить меня')}}
                    </x-checkbox>
                </x-form-item>
                <x-button type="submit" color="success">
                    {{__('Войти')}}
                </x-button>
            </x-form>
        </x-card-header>
    </x-card>
</x-auth>
