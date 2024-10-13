@if($session = session()->pull('alert'))
    <div class="alert alert-{{ ($session['type']) ?? 'success' }} mb-0 rounded-0 text-center small py-2" role="alert">
        {{ $session['text'] }}
    </div>
@endif
