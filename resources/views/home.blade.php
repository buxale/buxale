@extends('layouts.app')

@section('content')

    <div class="flex flex-wrap mb-6">
        <div class="w-full sm:w-1/3 pl-3 pr-3 sm:pl-0">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                    <p class="text-5xl leading-none font-extrabold text-brand">
                        18
                    </p>
                    <p class="mt-2 text-lg leading-6 font-medium text-gray-500">
                        neue Gutscheine diese Woche
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full sm:w-1/3 px-3">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                    <p class="text-5xl leading-none font-extrabold text-brand">
                        120€
                    </p>
                    <p class="mt-2 text-lg leading-6 font-medium text-gray-500">
                        Beitrag zum Pott
                    </p>
                </div>
            </div>
        </div>
        <div class="w-full sm:w-1/3 pl-3 pr-3 sm:pr-0">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                    <p class="text-5xl leading-none font-extrabold text-brand">
                        840,29€
                    </p>
                    <p class="mt-2 text-lg leading-6 font-medium text-gray-500">
                        werden morgen ausgezahlt
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ __('Deinen Checkout einbetten') }}
            </h3>
            <div class="mt-2 text-sm leading-5 text-gray-500">
                <p>
                    {{ __('Kopiere diesen Code in deinen <head> Bereich deiner Webseite') }}
                    {{ __('Benutzt du ein CMS, nimm gern Kontakt zu uns auf und wir helfen dir weiter.') }}
                </p>
                <pre class="bg-gray-800 rounded text-white mt-4">
                        {{ '
    <head>
      ....
      <script src="https://js.buxale.io/js/app.js"></script>
      <link href="https://js.buxale.io/css/app.css" rel="stylesheet" />
    </head>' }}
                </pre>
                <p class="mt-6">
                    {{ __('Irgendwo deiner Webseite, wo der Checkout verfügbar sein soll. Betrag sind in diesem Beispiel 10 Euro. Bitte tausche deinen API Token im Code gegen "DEIN_API_TOKEN_HIER" ein.') }}
                    {{ __('Verfügbare Farben sind: gray, red, orange, yellow, green, teal, blue, indigo, purple und pink.') }}
                </p>
                <pre class="bg-gray-800 rounded text-white mt-4">
                        {{ "
    <buxale-button
      api_token=\"DEIN_API_TOKEN_HIER\"
      success_url=\"https://app.buxale.io\"
      color=\"teal\"
      cancel_url=\"https://app.buxale.io\"
      amount=\"15\" />" }}
                </pre>
            </div>
            <form class="mt-3 text-sm leading-5">
                <a href="/mein-checkout"
                   class="font-medium text-green-600 hover:text-green-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    {{ __('Passe deinen Checkout an') }} &rarr;
                </a>
            </form>
        </div>
    </div>

    <div class="bg-white shadow sm:rounded-lg mt-6">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Wo soll dein Geld hin gehen?
            </h3>
            @if(!auth()->user()->stripe_account_id)
                <a
                        target="_blank"
                        class="inline-flex mt-3 items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150"
                        href="https://connect.stripe.com/express/oauth/authorize?client_id=ca_GxMF96tAgLnVfLXlUACHIrE3AHHaNWgP&stripe_user[email]={{auth()->user()->email}}">
                    Identität bestätigen und Bankkonto verbinden
                </a>
            @else
                <span class="inline-flex mt-3 items-center px-3 py-0.5 rounded-full text-sm font-medium leading-5 bg-green-100 text-green-800">
  <svg class="-ml-1 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
    <circle cx="4" cy="4" r="3"/>
  </svg>
  Verifizierter Account
</span>
                <div class="mt-5">
                    <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                        <div class="sm:flex sm:items-start">
                            <svg class="h-8 w-auto sm:flex-shrink-0 sm:h-6" fill="none" viewBox="0 0 36 24">
                                <rect width="36" height="24" fill="#224DBA" rx="4"/>
                                <path fill="#fff" fill-rule="evenodd"
                                      d="M10.925 15.673H8.874l-1.538-6c-.073-.276-.228-.52-.456-.635A6.575 6.575 0 005 8.403v-.231h3.304c.456 0 .798.347.855.75l.798 4.328 2.05-5.078h1.994l-3.076 7.5zm4.216 0h-1.937L14.8 8.172h1.937l-1.595 7.5zm4.101-5.422c.057-.404.399-.635.798-.635a3.54 3.54 0 011.88.346l.342-1.615A4.808 4.808 0 0020.496 8c-1.88 0-3.248 1.039-3.248 2.481 0 1.097.969 1.673 1.653 2.02.74.346 1.025.577.968.923 0 .519-.57.75-1.139.75a4.795 4.795 0 01-1.994-.462l-.342 1.616a5.48 5.48 0 002.108.404c2.108.057 3.418-.981 3.418-2.539 0-1.962-2.678-2.077-2.678-2.942zm9.457 5.422L27.16 8.172h-1.652a.858.858 0 00-.798.577l-2.848 6.924h1.994l.398-1.096h2.45l.228 1.096h1.766zm-2.905-5.482l.57 2.827h-1.596l1.026-2.827z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <div class="mt-3 sm:mt-0 sm:ml-4">
                            <div class="text-sm leading-5 font-medium text-gray-900">
                                Ending with 4242
                            </div>
                            <div class="mt-1 text-sm leading-5 text-gray-600 sm:flex sm:items-center">
                                <div>
                                    Expires 12/20
                                </div>
                                <span class="hidden sm:mx-2 sm:inline">
                &middot;
              </span>
                                <div class="mt-1 sm:mt-0">
                                    Last updated on 22 Aug 2017
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
          <span class="inline-flex rounded-md shadow-sm">
            <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
              Bearbeiten
            </button>
          </span>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>
@endsection
