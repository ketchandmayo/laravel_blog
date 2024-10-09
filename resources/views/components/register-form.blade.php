<x-auth>
    <x-card>
        <x-card-header>
            <x-card-title>
                {{__('Регистрация')}}
            </x-card-title>
            <div class="d-flex justify-content-between">
                <a href="{{route('login')}}">
                    {{__('Вход')}}
                </a>
            </div>
        </x-card-header>
        <x-card-header>
            <x-form action="{{ route('register.store') }}" method="POST">
                <x-form-item>
                    <x-label required>{{__('Имя')}}</x-label>
                    <input type="text" name="name" class="form-control" autofocus>
                </x-form-item>
                <x-form-item>
                    <x-label required>{{__('Email')}}</x-label>
                    <input type="email" name="email" class="form-control">
                </x-form-item>
                <x-form-item>
                    <x-label required>{{__('Пароль')}}</x-label>
                    <input type="password" name="password" class="form-control">
                </x-form-item>
                <x-form-item >
                    <x-label required>{{__('Повторить пароль')}}</x-label>
                    <input type="password" name="password_conf" class="form-control">
                </x-form-item>
                <x-form-item>
                    <x-checkbox name="remember">
                        {{__('Я согласен на все')}}
                    </x-checkbox>
                </x-form-item>
                <x-button type="submit" color="success">
                    {{__('Регистрация')}}
                </x-button>
            </x-form>
        </x-card-header>
    </x-card>
</x-auth>
