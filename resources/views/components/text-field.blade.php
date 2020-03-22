<div {{ $attributes->merge(['class' => 'sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5']) }}>
    <label for="{{ $name }}" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
        {{ $title ? $title : $slot }}
    </label>
    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class="max-w-xs relative rounded-md shadow-sm">
            <input id="{{ $name }}" wire:model="{{$name}}"
                   type="{{$type}}"
                   class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error($name) border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"/>
            @error($name)
            <div class="absolute text-red-500 inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                          clip-rule="evenodd"/>
                </svg>
            </div>
            @enderror
        </div>
        @error($name)
        <p class="mt-2 text-sm text-red-500">{{$message}}</p>
        @enderror
    </div>
</div>
