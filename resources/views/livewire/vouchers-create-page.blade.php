<form wire:submit.prevent="submit">
    <div>
        <div>
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Gutscheindaten
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    Diese Daten sind Relevant für deinen Beitrag an den Pott.
                </p>
            </div>
            <div class="mt-6 sm:mt-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="code" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Gutschein Nummer / Identifikation
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-xs relative rounded-md shadow-sm">
                            <input id="code" wire:model="code"
                                   class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('code') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"/>
                            @error('code')
                            <div class="absolute text-red-500 inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            @enderror
                        </div>
                        @error('code')
                            <p class="mt-2 text-sm text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                </div>


                <div class="mt-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="value" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        <span class="font-black">BRUTTO</span> Wert des Gutscheines.
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-1">
                        <div class="max-w-xs rounded-md shadow-sm">
                            <input id="value" wire:model="value"
                                   class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                        </div>
                    </div>
                    <div class="mt-1 sm:mt-0 sm:col-span-1">
                        <span>Dein Beitrag für den Pott wären <span class="font-bold">@money($pott_amount * 100, 'EUR')</span></span>
                    </div>
                </div>

            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-8 sm:mt-5 sm:pt-10">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Infos zum Käufer
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    Speichere Daten zu deinem Kunden.
                </p>
            </div>
            <div class="mt-6 sm:mt-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_name"
                           class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Voller Name *
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-xs rounded-md shadow-sm">
                            <input id="customer_name"
                                   wire:model="customer_name"
                                   class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_email"
                           class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Email *
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg rounded-md shadow-sm">
                            <input id="customer_email" type="email"
                                   wire:model="customer_email"
                                   class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_phone"
                           class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Telefon
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-xs rounded-md shadow-sm">
                            <input id="customer_phone"
                                   wire:model="customer_phone"
                                   class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_street"
                           class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Straße
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-xs rounded-md shadow-sm">
                            <input id="customer_street"
                                   wire:model="customer_street"
                                   class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                        </div>
                    </div>
                </div>
                <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_street_no"
                           class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Hausnummer
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-xs rounded-md shadow-sm">
                            <input id="customer_street_no"
                                   wire:model="customer_street_no"
                                   class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="customer_city"
                           class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Stadt
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-xs rounded-md shadow-sm">
                            <input id="customer_city"
                                   wire:model="customer_city"
                                   class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                        </div>
                    </div>
                </div>

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
                    Notifications
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    We'll always let you know about important changes, but you pick what else you want to hear about.
                </p>
            </div>
            <div class="mt-6 sm:mt-5">
                <div class="sm:border-t sm:border-gray-200 sm:pt-5">
                    <fieldset>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                            <div>
                                <legend class="text-base leading-6 font-medium text-gray-900 sm:text-sm sm:leading-5 sm:text-gray-700">
                                    By Email
                                </legend>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg">
                                    <div class="relative flex items-start">
                                        <div class="absolute flex items-center h-5">
                                            <input id="comments" type="checkbox"
                                                   class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"/>
                                        </div>
                                        <div class="pl-7 text-sm leading-5">
                                            <label for="comments" class="font-medium text-gray-700">Comments</label>
                                            <p class="text-gray-500">Get notified when someones posts a comment on a
                                                posting.</p>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="relative flex items-start">
                                            <div class="absolute flex items-center h-5">
                                                <input id="candidates" type="checkbox"
                                                       class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"/>
                                            </div>
                                            <div class="pl-7 text-sm leading-5">
                                                <label for="candidates"
                                                       class="font-medium text-gray-700">Candidates</label>
                                                <p class="text-gray-500">Get notified when a candidate applies for a
                                                    job.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="relative flex items-start">
                                            <div class="absolute flex items-center h-5">
                                                <input id="offers" type="checkbox"
                                                       class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"/>
                                            </div>
                                            <div class="pl-7 text-sm leading-5">
                                                <label for="offers" class="font-medium text-gray-700">Offers</label>
                                                <p class="text-gray-500">Get notified when a candidate accepts or
                                                    rejects an offer.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="mt-6 sm:mt-5 sm:border-t sm:border-gray-200 sm:pt-5">
                    <fieldset>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                            <div>
                                <legend class="text-base leading-6 font-medium text-gray-900 sm:text-sm sm:leading-5 sm:text-gray-700">
                                    Push Notifications
                                </legend>
                            </div>
                            <div class="sm:col-span-2">
                                <div class="max-w-lg">
                                    <p class="text-sm leading-5 text-gray-500">These are delivered via SMS to your
                                        mobile phone.</p>
                                    <div class="mt-4">
                                        <div class="flex items-center">
                                            <input id="push_everything" name="form-input push_notifications"
                                                   type="radio"
                                                   class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"/>
                                            <label for="push_everything" class="ml-3">
                                                <span class="block text-sm leading-5 font-medium text-gray-700">Everything</span>
                                            </label>
                                        </div>
                                        <div class="mt-4 flex items-center">
                                            <input id="push_email" name="form-input push_notifications" type="radio"
                                                   class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"/>
                                            <label for="push_email" class="ml-3">
                                                <span class="block text-sm leading-5 font-medium text-gray-700">Same as email</span>
                                            </label>
                                        </div>
                                        <div class="mt-4 flex items-center">
                                            <input id="push_nothing" name="form-input push_notifications" type="radio"
                                                   class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"/>
                                            <label for="push_nothing" class="ml-3">
                                                <span class="block text-sm leading-5 font-medium text-gray-700">No push notifications</span>
                                            </label>
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
    <div class="mt-8 border-t border-gray-200 pt-5">
        <div class="flex justify-end">
      <span class="inline-flex rounded-md shadow-sm">
        <button type="button"
                class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
          Cancel
        </button>
      </span>
            <span class="ml-3 inline-flex rounded-md shadow-sm">
        <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
          Save
        </button>
      </span>
        </div>
    </div>
</form>
