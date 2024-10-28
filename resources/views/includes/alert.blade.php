@if($alert = session()->pull('alert'))
    <div id="alert" class="alert alert-{{ ($alert['type']) ?? 'success' }} mb-0 rounded-0 text-center small py-2"
         role="alert">
        {{ $alert['text'] }}
    </div>
@endif
