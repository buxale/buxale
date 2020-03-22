@extends('layouts.app')

@section('content')

    <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ __('Verify Your Email Address') }}
            </h3>
            <div class="mt-2 max-w-xl text-sm leading-5 text-gray-500">
                <p>
                    {{ __('A fresh verification link has been sent to your email address.') }}
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                </p>
            </div>
            <form class="mt-3 text-sm leading-5">
                @csrf
                <button type="submit"
                        class="font-medium text-green-600 hover:text-green-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    {{ __('click here to request another') }} &rarr;
                </button>
            </form>
        </div>
    </div>
@endsection
