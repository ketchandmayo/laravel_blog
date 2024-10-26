<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page.title', config('app.name'))</title>
    @vite(['resources/css/app.css'])
    @stack('css')
    <style>
        .container { max-width: 1080px; }
        .required:after { content: '*'; color: red; margin-left: 3px; }
    </style>
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

@vite(['resources/js/app.js'])
@stack('js')
</body>
</html>
