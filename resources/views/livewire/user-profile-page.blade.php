<div>
    <div class="mt-6 bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Persönliche Daten</h3>
                <p class="mt-1 text-sm leading-5 text-gray-500">
                    Hier kannst Du deine persönlichen Daten aktualisieren.
                </p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="#" method="POST">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-5">
                            <label for="name" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Voller Name') }}</label>
                            <input wire:model="user.name" name="name" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>

                        <div class="col-span-6 sm:col-span-5">
                            <label for="company" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Firma') }}</label>
                            <input wire:model="user.company" name="company" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="street" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Straße') }}</label>
                            <input wire:model="user.street" name="street" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="street_no" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Nr.') }}</label>
                            <input wire:model="user.street_no" name="street_no" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="zip" class="block text-sm font-medium leading-5 text-gray-700">{{ __('PLZ') }}</label>
                            <input wire:model="user.zip" name="zip" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="city" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Stadt') }}</label>
                            <input wire:model="user.city" name="city" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>

                        <div class="col-span-6 sm:col-span-5">
                            <label for="country" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Land') }}</label>
                            <input wire:model="user.country" name="country" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>

                        <div class="col-span-6 sm:col-span-5">
                            <label for="phone" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Telefon') }}</label>
                            <input wire:model="user.phone" name="phone" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>


                        <div class="col-span-6 sm:col-span-5">
                            <span class="inline-flex rounded-md shadow-sm">
                                <button
                                    type="button"
                                    class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150"
                                    wire:click="update"
                                >
                                    {{__('Speichern')}}
                                </button>
                            </span>
                            @if($showSuccess)
                                <span class="ml-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-green-100 text-green-800">
                                        {{__('Änderungen gespeichert')}}
                                    </span>
                                </span>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
