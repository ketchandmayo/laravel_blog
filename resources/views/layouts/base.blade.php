<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page.title', config('app.name'))</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @stack('css')

</head>
<body>
<div class="text—center min—vh—100 d—flex flex—column justify—content—between">
    @include('includes.alert')
    @include('includes.header')

    <main class="container py-5 mt-5">
        @yield('content')
    </main>

    @include('includes.footer')
</div>

@stack('js')
</body>
</html>
