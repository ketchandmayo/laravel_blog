<footer class="text-end py-3 fixed-bottom border-top bg-body">
        <div class="d-flex justify-content-between align-items-end">
            <div class="ms-4">
                ©{{config('app.name')}} {{$date}}
            </div>

            <div class="d-flex align-items-center gap-3 me-5">
                <x-form id="theme-form" method="POST" action="{{ route('changeTheme') }}">
                    <button id="theme-toggle" type="submit" class="nav-link">
                        <i id="theme-icon" class="fas {{ $theme_icon }}"></i>
                    </button>
                </x-form>
            </div>
        </div>
</footer>

@push('js')
    <script type="module">
        ajaxSimpleRequest('theme-form', '{{ route('changeTheme') }}')
    </script>
@endpush
