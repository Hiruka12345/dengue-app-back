<nav x-data="{ open: false }" class="bg-black shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left Side - Navigation Links -->
            <div class="flex space-x-10">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-white hover:text-blue-500 transition duration-300 ease-in-out transform hover:scale-105">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link href="{{ route('reports') }}" :active="request()->routeIs('reports')" class="text-white hover:text-blue-500 transition duration-300 ease-in-out transform hover:scale-105">
                    {{ __('Reports') }}
                </x-nav-link>
                <x-nav-link href="{{ route('active-cases') }}" :active="request()->routeIs('active-cases')" class="text-white hover:text-blue-500 transition duration-300 ease-in-out transform hover:scale-105">
                    {{ __('Active Cases') }}
                </x-nav-link>
                <x-nav-link href="{{ route('resolved-cases') }}" :active="request()->routeIs('resolved-cases')" class="text-white hover:text-blue-500 transition duration-300 ease-in-out transform hover:scale-105">
                    {{ __('Resolved Cases') }}
                </x-nav-link>
            </div>

            <!-- Right Side - User Dropdown -->
            <div class="hidden sm:flex sm:items-center space-x-4">
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-white text-sm font-medium focus:outline-none transition">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="ms-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif
                            <div class="border-t border-gray-200"></div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}"
                                                 @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger Menu for Mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-blue-500 hover:bg-gray-800 focus:outline-none focus:bg-gray-800 focus:text-blue-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-white hover:text-blue-500">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('reports') }}" :active="request()->routeIs('reports')" class="text-white hover:text-blue-500">
                {{ __('Reports') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('active-cases') }}" :active="request()->routeIs('active-cases')" class="text-white hover:text-blue-500">
                {{ __('Active Cases') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('resolved-cases') }}" :active="request()->routeIs('resolved-cases')" class="text-white hover:text-blue-500">
                {{ __('Resolved Cases') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('settings') }}" :active="request()->routeIs('settings')" class="text-white hover:text-blue-500">
                {{ __('Settings') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="flex items-center px-4">
                <div>
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="text-white hover:text-blue-500">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')" class="text-white hover:text-blue-500">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" class="text-white hover:text-blue-500"
                                           @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
