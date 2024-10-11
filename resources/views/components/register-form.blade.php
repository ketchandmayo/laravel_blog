<x-auth>
    <x-card>
        <x-card-header>

            <div class="d-flex justify-content-between">
                <div>
                    <x-card-title>
                        {{__('Регистрация')}}
                    </x-card-title>
                </div>
                <div>
                    <a href="{{route('login')}}">
                        {{__('Вход')}}
                    </a>
                </div>

            </div>
        </x-card-header>
        <x-card-header>
            <x-form action="{{ route('register.store') }}" method="POST">
                <x-form-item>
                    <x-label required>{{__('Имя')}}</x-label>
                    <x-input type="text" name="name" autofocus />
                </x-form-item>
                <x-form-item>
                    <x-label required>{{__('Email')}}</x-label>
                    <x-input type="email" name="email" />
                </x-form-item>
                <x-form-item>
                    <x-label required>{{__('Пароль')}}</x-label>
                    <x-input type="password" name="password" />
                </x-form-item>
                <x-form-item >
                    <x-label required>{{__('Повторить пароль')}}</x-label>
                    <x-input type="password" name="password_confirmation" />
                </x-form-item>
                <x-form-item>
                    <x-checkbox name="agree">
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
