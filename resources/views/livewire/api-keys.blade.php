<div>

    {{-- no api key --}}
    @if(! count($apiKeys))
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                {{__('Noch kein API Token vorhanden')}}
            </div>
        </div>

    @else
        {{-- show existing api keys --}}
        <div class="flex flex-col">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                {{__('Name')}}
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                {{__('Rechte')}}
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                {{__('Zuletzt verwendet')}}
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                {{__('Erstellt')}}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($apiKeys AS $apiKey)
                            <tr class="bg-white">
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                    {{$apiKey->id}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    {{$apiKey->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    {{Illuminate\Support\Arr::get($apiKey->abilities, 'access', '*')}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    {{$apiKey->last_used_at}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    {{$apiKey->created_at}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif


    {{-- display new api key --}}
    @if(! empty($plainTextToken))
        <div class="bg-white shadow sm:rounded-lg mt-4">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{__('Ihr neuer API Key')}}
                </h3>
                <div class="mt-5">
                    <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between break-all">
                        {{$plainTextToken}}
                    </div>
                </div>
            </div>
        </div>
    @endif


    {{-- buttons / delete existing keys, create new key --}}
    <div class="w-full px-4 sm:px-0 mt-4">
        @if(! empty($apiKeys))
            <span class="inline-flex rounded-md shadow-sm py-2 sm:py-0">
                <button
                    type="button"
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-orange-600 hover:bg-orange-500 focus:outline-none focus:border-orange-700 focus:shadow-outline-orange active:bg-orange-700 transition ease-in-out duration-150"
                    wire:click="deleteApiKeys"
                >
                    {{__('Alle keys löschen')}}
                </button>
            </span>
        @endif

        <span class="inline-flex rounded-md shadow-sm py-2 sm:py-0">
            <button
                type="button"
                class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150"
                wire:click="generateApiKey('full')"
            >
                {{__('Neuen Full Access API Key generieren')}}
            </button>
        </span>

        <span class="inline-flex rounded-md shadow-sm py-2 sm:py-0">
            <button
                type="button"
                class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150"
                wire:click="generateApiKey('stripe')"
            >
                {{__('Neuen Stripe API Key generieren')}}
            </button>
        </span>
    </div>

</div>
