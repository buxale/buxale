<div class="w-full flex flex-wrap justify-between px-4 xs:px-6 sm:px-0">
    <div class="w-full sm:w-1/3">
        <label for="email" class="sr-only">Email</label>
        <div class="relative rounded-md shadow-sm">
            <input id="search" wire:model="search" class="form-input block w-full sm:text-sm sm:leading-5" placeholder="Suchen..." />
        </div>
    </div>

    <div>
        <span class="inline-flex rounded-md shadow-sm py-4 sm:py-0">
          <a href="/vouchers/create" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-brand hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition ease-in-out duration-150">
            Neuer Gutschein
          </a>
        </span>
    </div>
</div>

<div class="w-full bg-white shadow overflow-hidden sm:rounded-md mt-6 px-4 xs:px-6 sm:px-0">
    @if(!$vouchers->count())
        <div class="text-center">
            <span class="block font-hairline font-xl mt-6 text-3xl text-gray-300">{{__('Noch keine Gutscheine vorhanden')}}</span>
        </div>
    @endif

    <ul>
        @foreach($vouchers as $voucher)
            <li @if(!$loop->first)  class="border-t border-gray-200" @endif >
                <a href="/vouchers/{{$voucher->id}}"
                   class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="sm:px-4 py-4 sm:px-6">
                        <div class="w-full flex flex-col xs:flex-row xs:items-center xs:justify-between">
                            <div class="text-sm leading-5 font-medium text-green-600 truncate">
                                {{$voucher->code}} - @money($voucher->value * 100, 'EUR')
                            </div>
                            <div class="sm:ml-2 pt-2 sm:pt-0 flex-shrink-0 flex">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Nicht eingelöst
                                </span>
                            </div>
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                            <div class="sm:flex">
                                <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor"
                                         viewBox="0 0 20 20">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                    </svg>
                                    {{ $voucher->customer_name }}
                                </div>
                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 24 24"
                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>
                                    {{ $voucher->customer_email }}
                                </div>
                            </div>
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <span>
                                    Erstellt am {{ $voucher->created_at->format('d.m.Y') }} um {{ $voucher->created_at->format('H:i') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
        <div class="my-6">
            {{ $vouchers->links() }}
        </div>
</div>
