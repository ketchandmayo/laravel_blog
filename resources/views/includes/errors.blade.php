@if($errors->any())
    <div class="alert alert-danger small p-2">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
