<div class="border-bottom mb-3 pb-3">
    @isset($link)
        <div class="mb-2">
            {{$link}}
        </div>
    @endisset

    <div class="d-flex justify-content-between">
        <div>
            <h2>
                {{ $slot }}
            </h2>
        </div>

        @isset($right)
            <div>
                {{ $right }}
            </div>
        @endisset
    </div>


</div>

