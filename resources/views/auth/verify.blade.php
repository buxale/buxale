@extends('layouts.app')

@section('content')

    <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ __('Verifiziere deine E-Mail') }}
            </h3>
            <div class="mt-2 max-w-xl text-sm leading-5 text-gray-500">
                <p>
                    {{ __('Ein frischer Verifikations-Link wurde an deine E-Mail versendet..') }}
                    {{ __('Bevor du fortfahren kannst, bestätige bitte deine Mail.') }}
                </p>
            </div>
            <form class="mt-3 text-sm leading-5">
                @csrf
                <button type="submit"
                        class="font-medium text-green-600 hover:text-green-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    {{ __('Klicke hier um einen neuen Link zu erhalten.') }} &rarr;
                </button>
            </form>
        </div>
    </div>
@endsection
