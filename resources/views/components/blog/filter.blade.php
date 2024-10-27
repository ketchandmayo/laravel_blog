<x-form method='GET' action="{{ route('blog') }}">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-input name="search" value="{{ request('search') }}" placeholder="{{__('Поиск')}}" />
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <x-select name="user_id" value="{{ request('user_id') }}" :options="$user_id"/>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <x-button type="submit" bootstrap="w-100">
                            {{ __('Применить') }}
                        </x-button>
                    </div>
                    <div class="col-6">
                        <x-button-link href="{{ route('blog') }}" color="secondary" bootstrap="w-100">
                            {{ __('Сбросить') }}
                        </x-button-link>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-form>
