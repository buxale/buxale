<div class="fixed pin-t pin-x z-40">
    <div class="bg-gradient-primary text-white h-1"></div>

    <nav class="flex items-center justify-start sm:justify-between text-black bg-navbar shadow-xs h-16">
        <div class="flex items-center flex-no-shrink">
            <a href="{{ url('/') }}" class="flex items-center flex-no-shrink text-black  mx-2 sm:mx-4">
                @include("larecipe::partials.logo")
            </a>

            <div class="switch mx-0">
                <input type="checkbox" name="1" id="1" v-model="sidebar" class="switch-checkbox"/>
                <label class="switch-label" for="1"></label>
            </div>
        </div>

        <div class="block mx-1 sm:mx-4 flex items-center">
            @if(config('larecipe.search.enabled'))
                <larecipe-button id="search-button"
                                 :type="searchBox ? 'primary' : 'link'"
                                 @click="searchBox = ! searchBox"
                                 class="px-4">
                    <i class="fas fa-search" id="search-button-icon"></i>
                </larecipe-button>
            @endif

            <larecipe-button tag="a" href="https://github.com/buxale/" target="__blank" type="black" class="mx-2 px-2 py-2 sm:py-3 sm:px-4">
                <i class="fab fa-github"></i>
            </larecipe-button>

            {{-- versions dropdown --}}
            <larecipe-dropdown class="beta-btn">
                <larecipe-button type="primary" class="flex p-2 sm:p-3">
                    {{ $currentVersion }} <i class="mx-1 fa fa-angle-down"></i>
                </larecipe-button>

                <template slot="list" class="w-full" style="width: -webkit-fill-available">
                    <ul class="list-reset w-full">
                        @foreach ($versions as $version)
                            <li class="w-full py-2 hover:bg-grey-lightest">
                                <a class="px-4 sm:px-6 text-grey-darkest flex whitespace-no-wrap"
                                   href="{{ route('larecipe.show', ['version' => $version, 'page' => $currentSection]) }}">{{ $version }}</a>
                            </li>
                        @endforeach
                    </ul>
                </template>
            </larecipe-dropdown>
            {{-- /versions dropdown --}}

            @auth
                {{-- account --}}
                <larecipe-dropdown>
                    <larecipe-button type="white" class="ml-2 px-1 py-2 sm:py-3 px-6">
                        {{ auth()->user()->name ?? 'Account' }} <i class="fa fa-angle-down"></i>
                    </larecipe-button>

                    <template slot="list">
                        <form action="/logout" method="POST">
                            {{ csrf_field() }}

                            <button type="submit" class="py-2 px-4 text-white bg-danger inline-flex"><i
                                        class="fa fa-power-off mr-2"></i> Logout
                            </button>
                        </form>
                    </template>
                </larecipe-dropdown>
                {{-- /account --}}
            @endauth
        </div>
    </nav>
</div>
