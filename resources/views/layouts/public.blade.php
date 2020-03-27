<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Buxale') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=DM+Sans&display=swap" rel="stylesheet">

    <script src="https://js.stripe.com/v3/"></script>

    @livewireStyles
    <script src="https://js.buxale.io/js/app.js"></script>
    <link href="https://js.buxale.io/css/app.css" rel="stylesheet"/>

</head>
<body class="font-sans">
<div>
    <x-announce/>
    @yield('content')
    <x-footer/>
</div>


@livewireScripts
</body>
</html>
