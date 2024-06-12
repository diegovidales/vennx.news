<nav x-data="{ open: false }" class="bg-blue-600">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                {{-- Logo --}}
                <div class="flex-shrink-0">
                    <a href="/">
                        <x-logo width="150" />
                    </a>
                </div>
                {{-- Navegação --}}
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-layouts.nav-link href="{{ route('news') }}" :active="request()->routeIs('news')">{{ __('News') }}</x-layouts.nav-link>
                        <x-layouts.nav-link href="{{ route('my_news') }}" :active="request()->routeIs('my_news')">{{ __('My News') }}</x-layouts.nav-link>
                    </div>
                </div>
            </div>
            {{-- Login/Registro --}}
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6 gap-3">
                    @guest
                        <x-layouts.nav-link href="/login" :active="request()->is('login')">
                            <x-icon.login color="#ffffff" />{{ __('Log in') }}
                        </x-layouts.nav-link>
                        <x-layouts.nav-link href="/register" :active="request()->is('register')">
                            <x-icon.register color="#ffffff"/>{{ __('Register') }}
                        </x-layouts.nav-link>
                    @endguest
                </div>
            </div>
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden" id="mobile-menu">
        <x-misc.separator class="my-2" />
        <span class="my-2 mx-2 text-xl text-blue-200">{{ __("Navigation") }}</span>
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <x-layouts.responsive-nav-link href="{{ route('news') }}" :active="request()->routeIs('news')">{{ __('News') }}</x-layouts.nav-link>
            <x-layouts.responsive-nav-link href="{{ route('my_news') }}" :active="request()->routeIs('my_news')">{{ __('My News') }}</x-layouts.nav-link>
        </div>
        @guest
            <span class="my-2 mx-2 text-xl text-blue-200">{{ __("Users") }}</span>
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <x-layouts.responsive-nav-link href="/login" :active="request()->is('login')">
                    <div class="inline-flex">
                        <x-icon.login color="#ffffff" />{{ __('Log in') }}
                    </div>
                </x-layouts.nav-link>
                <x-layouts.responsive-nav-link href="/register" :active="request()->is('register')">
                    <div class="inline-flex">
                        <x-icon.register color="#ffffff"/>
                        {{ __('Register') }}
                    </div>
                </x-layouts.nav-link>
            </div>
        @endguest
        
    </div>
</nav>