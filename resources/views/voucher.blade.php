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
    <script src="https://js.stripe.com/v3/"></script>

    @livewireStyles
    <script src="https://js.buxale.io/js/app.js"></script>
    <link href="https://js.buxale.io/css/app.css" rel="stylesheet" />

</head>
<body>
<div>
    <x-announce/>


    <div class="py-10 container mx-auto flex justify-center">
        <div class="rounded w-full lg:w-2/3 xl:w-1/2 bg-white shadow p-4 px-24 text-center">
            <div class="flex justify-center my-6">
                <img class="h-12 w-auto" src="/img/buxale-logo.png" alt=""/>
            </div>
            <h1 class="font-bold text-3xl">Dein Gutschein über</h1>
            <h2 class="font-bold text-5xl">@money($voucher->value * 100, 'EUR')</h2>

            @if($voucher->paid_at)
                <span class="my-3 inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium leading-5 bg-green-100 text-green-800">
                  Bezahlt
                </span><br>
            @endif

            <span>Dein Code: {{$voucher->code}}</span>
            <div class="flex justify-center">
                {!! QrCode::size(300)->generate($voucher->code); !!}
            </div>

            <p class="text-gray-500 mt-6">Dein Gutschein von {{$voucher->user->company}} sollte erst nach unserem
                Stichtag, dem 01.10.2020, eingelöst werden. Wobei du natürlich
                jede Freiheit hast, den Gutschein auch vorher einzulösen.</p>
            @if(!$voucher->paid_at && $voucher->open_for_payment)
                <div class="flex justify-center">
                    <buxale-button
                            api_token="e6FUjaw1tEBJxZ8cDWHxRjoUHZTDfwe4WD8IXFOPJ7fDx0X7zAq9nCgbOUTjHvokhsURjnP70gkz1aaU"
                            voucher_id="{{$voucher->id}}"
                            success_url="https://cierra.de/" cancel_url="https://app.buxale.io"
                            amount="{{$voucher->value}}"/>
                </div>
            @else
                <div class="flex justify-center no-print">
                    <div class="p-4">
                        <div class="flex">
                            <button type="button" onclick="window.print()" class="inline-flex whitespace-no-wrap h-12 items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded focus:outline-none transition ease-in-out overflow-hidden duration-150 focus:border-green-300 text-green-50 bg-brand hover:bg-green-400 focus:shadow-outline-brand active:bg-green-500">
                                <span class="whitespace-no-wrap">Drucke Beleg von </span>
                                <img src="https://app.buxale.io/img/buxale-logo.png" v-if="showBuxale" class="logo" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <x-footer/>
</div>


@livewireScripts
</body>
</html>
