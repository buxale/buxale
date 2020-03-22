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

    @if(auth()->user())
        @livewireStyles
    @endif
</head>
<body>
<div>
    <x-announce/>
    <x-navbar/>


    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-normal leading-tight text-gray-900">
                {{ isset($title) && $title ? $title : 'Dashboard'}}
            </h2>
        </div>
        <div class="max-w-7xl mt-4 mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </div>
    <x-footer/>
</div>


@if(auth()->user())
    @livewireScripts
@endif
</body>
</html>
