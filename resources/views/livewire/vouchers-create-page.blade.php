<form wire:submit.prevent="submit">
    <div class="w-full px-4 sm:px-0">
        <div class="w-full">
            <div class="w-full">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Gutscheindaten
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    Diese Daten sind Relevant für deinen Beitrag an den Pott.
                </p>
            </div>
            <div class="mt-6 sm:mt-5">
                <x-text-field name="code" title="Gutschein Nummer / Identifikation"/>
                <button type="button" wire:click="generateVoucherCode"
                        class="font-medium text-green-600 hover:text-green-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    {{ __('Generiere den Code für mich') }} &rarr;
                </button>

                @if($code)
                    <div>
                        <span>Dein QR Code:</span>
                        {!! QrCode::size(300)->generate($code); !!}
                        <a href="/qr-code?code={{$code}}" target="_blank">Download</a>
                    </div>
                @endif

                <x-text-field class="mt-6" name="value"><span class="font-black">BRUTTO</span> Wert des Gutscheines.
                </x-text-field>

                <div class="mt-6 sm:col-span-1 border-t border-gray-200 pt-8">
                    <span class="text-lg">Dein Beitrag für den Pott wären <span class="font-bold">@money($pott_amount * 100, 'EUR')</span></span>
                </div>

            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-8 sm:mt-6 sm:pt-10">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Infos zum Käufer
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    Speichere Daten zu deinem Kunden.
                </p>
            </div>
            <div class="mt-6 sm:mt-5">
                <x-text-field class="mt-6" name="customer_name" title="Voller Name *"/>
                <x-text-field type="email" class="mt-6" name="customer_email" title="Email *"/>
                <x-text-field class="mt-6" name="customer_phone" title="Telefon"/>
                <x-text-field class="mt-6" name="customer_street" title="Straße"/>
                <x-text-field class="mt-6" name="customer_street_no" title="Hausnummer"/>
                <x-text-field class="mt-6" name="customer_zip" title="PLZ"/>
                <x-text-field class="mt-6" name="customer_city" title="Stadt"/>
                <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_country"
                           class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Land
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-xs rounded-md shadow-sm">
                            <select id="customer_country"
                                    wire:model="customer_country"
                                    class="block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                <option>Deutschland</option>
                                <option>Österreich</option>
                                <option>Schweiz</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-8 sm:mt-5 sm:pt-10">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Benachrichtigungen
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    Wir lassen dir die Wahl, ob dein Kunde eine Mail von uns bekommen soll, mit der Bestätigung seiner
                    Absicherung.
                </p>
            </div>
            <div class="mt-6 sm:mt-5">
                <div class="sm:border-t sm:border-gray-200 sm:pt-5">
                    <fieldset>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                            <div>
                                <legend class="text-base leading-6 font-medium text-gray-900 sm:text-sm sm:leading-5 sm:text-gray-700">
                                    Email
                                </legend>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg">
                                    <div class="relative flex items-start">
                                        <div class="absolute flex items-center h-5">
                                            <input id="notify_customer" wire:model="notify_customer" type="checkbox"
                                                   class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"/>
                                        </div>
                                        <div class="pl-7 text-sm leading-5">
                                            <label for="notify_customer" class="font-medium text-gray-700">Sende
                                                Bestätigung</label>
                                            <p class="text-gray-500">Benachrichtige den Kunden über seine buxale
                                                Absicherung.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mt-6">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                            <div>
                                <legend class="text-base leading-6 font-medium text-gray-900 sm:text-sm sm:leading-5 sm:text-gray-700">
                                    Bazahlung
                                </legend>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg">

                                    <div class="relative flex items-start">
                                        <div class="absolute flex items-center h-5">
                                            <input id="open_for_payment" wire:model="open_for_payment" type="checkbox"
                                                   class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"/>
                                        </div>
                                        <div class="pl-7 text-sm leading-5">
                                            <label for="open_for_payment" class="font-medium text-gray-700">Ermögliche
                                                Zahlung</label>
                                            <p class="text-gray-500">Lasse deinen Kunden den Gutschein bequem online
                                                bezahlen.</p>
                                        </div>
                                    </div>

                                    <div class="relative flex items-start mt-3">
                                        <div class="absolute flex items-center h-5">
                                            <input id="already_paid" wire:model="already_paid" type="checkbox"
                                                   class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"/>
                                        </div>
                                        <div class="pl-7 text-sm leading-5">
                                            <label for="already_paid" class="font-medium text-gray-700">Gutschein
                                                <strong class="font-bold">ist bezahlt</strong></label>
                                            <p class="text-gray-500">Hat dein Kunde den Gutschein schon bezahlt?</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full mt-8 border-t border-gray-200 pt-5">
        <div class="flex justify-center sm:justify-end px-6 sm:px-0">

            {{-- cancel button--}}
            <span class="ml-3 inline-flex rounded-md shadow-sm">
                <a
                    href="{{route('vouchers.index')}}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                        Abbrechen
                </a>
            </span>

            {{-- save button --}}
            <span class="ml-3 inline-flex rounded-md shadow-sm">
                <button
                    type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-brand hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition duration-150 ease-in-out">
                        Speichern
                </button>
            </span>
        </div>
    </div>
</form>
