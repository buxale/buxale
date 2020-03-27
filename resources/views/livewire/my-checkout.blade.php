<div class="mx-4 sm:m-0">
    <h2 class="text-lg leading-6 font-medium text-gray-900 mb-3 mt-6">Webhooks</h2>
    <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Webhook Ziel
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Auth Token
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Events
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($webhooks as $webhook)
                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                {{$webhook->webhook}}
                            </td>
                            <td x-data="{show: false}"
                                class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                <span x-show="show">
                                    {{$webhook->auth_token}} <button
                                            class="py-1 px-2 ml-2 shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
                                            @click="show = !show">Ausblenden</button>
                                </span>
                                <span x-show="!show">
                                    ******** <button
                                            class="py-1 px-2 ml-2 shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
                                            @click="show = !show">Einblenden</button>
                                </span>

                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{ $webhook->events }}
                                <button
                                        class="py-1 px-2 ml-2 shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
                                        wire:click="sendTestWebhook({{$webhook->id}})">Test senden
                                </button>
                            </td>
                            <td x-data="{ open: false }"
                                class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">


                                <button @click="open = true"
                                        class="text-red-600 hover:text-red-900 focus:outline-none focus:underline">
                                    Löschen
                                </button>
                                <div x-show="open"
                                     class="fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center z-10">
                                    <div x-show="open" x-transition:enter="ease-out duration-300"
                                         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                         x-transition:leave="ease-in duration-200"
                                         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                         class="fixed inset-0 transition-opacity">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>

                                    <div x-show="open" x-transition:enter="ease-out duration-300"
                                         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                         x-transition:leave="ease-in duration-200"
                                         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                         class="bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                    Webhook löschen?
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-sm leading-5 text-gray-500">
                                                        Bist du dir sicher, dass du diese Webhook,<br>
                                                        auf {{$webhook->webhook}} löschen willst?<br>
                                                        <b>Das kann nicht rückgängig gemacht werden!</b>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
      <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
        <button wire:click="deleteHook({{$webhook->id}})" @click="open = false;" type="button"
                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
          Löschen
        </button>
      </span>
                                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
        <button @click="open = false;" type="button"
                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5">
          Lieber nicht!
        </button>
      </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                    <tfoot>
                    <form wire:submit.prevent="saveWebhook">
                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                <div>
                                    <label for="new_webhook" class="sr-only">Email</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <input id="new_webhook" wire:model="new_webhook"
                                               class="form-input block w-full sm:text-sm sm:leading-5"
                                               placeholder="https://example.com/webhooks/buxale"/>
                                    </div>
                                </div>
                                <p class="text-gray-500 mt-2">Bitte benutze die komplette URL mit https://</p>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                <div class="">
                                    <label for="new_auth_token" class="sr-only">Email</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <input id="new_auth_token" wire:model="new_auth_token"
                                               class="form-input block w-full sm:text-sm sm:leading-5"
                                               placeholder="1234-1234-1234-1234"/>
                                    </div>
                                </div>
                                <p class="text-gray-500 mt-2">Den Token kannst du nach belieben anpassen.</p>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                all
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <button type="submit"
                                        class="text-brand hover:text-green-900 focus:outline-none focus:underline">
                                    Speichern
                                </button>
                            </td>
                        </tr>
                    </form>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 mt-6">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 p-4">

                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Dein interner Checkout</h3>
                        <p class="mt-1 text-sm leading-5 text-gray-500">
                            Hier kannst Du aktivieren ob dein Checkout unter <a class="text-brand underline"
                                                                                target="_blank"
                                                                                href="{{url(auth()->user()->checkout_url)}}">Deinem
                                Checkout</a> aktiviert sein soll. Außerdem siehst du den public Token, der verwendet
                            wird.
                        </p>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-6 gap-6">
                            @if(auth()->user()->checkout_token)
                                <div class="col-span-6 sm:col-span-5 flex flex-wrap">
                                    <label for="checkout_token"
                                           class="block text-sm font-medium leading-5 text-gray-700">{{ __('Mein Checkout token') }}</label>
                                    <input wire:model="checkout_token" name="checkout_token"
                                           disabled
                                           class="mt-1 text-gray-400 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                                </div>
                            @else
                                <div class="w-full flex-col justify-center mt-4">
                                    <button
                                            class="py-1 px-2 ml-2 shadow overflow-hidden sm:rounded-lg border-b border-gray-200 whitespace-no-wrap"
                                            wire:click="activateCheckout()">Checkout aktivieren
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
