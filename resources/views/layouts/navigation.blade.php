<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-10 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    @livewire('nav-route')
                </div>

                @canany(['admin', 'autor', 'user'])
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                        <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                            {{ __('Inicio') }}
                        </x-nav-link>
                    </div>
                @endcanany
                @canany('admin')
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </div>                    
                @endcanany
                @can('admin')
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                        <x-nav-link :href="route('employees.index')" :active="request()->routeIs('employees.index')">
                            {{ __('Autores') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                        <x-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')">
                            {{ __('Categorias') }}
                        </x-nav-link>
                    </div>
                @endcan
                @canany(['admin', 'autor'])
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex text-black">
                        <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                            {{ __('Post') }}
                        </x-nav-link>
                    </div>
                @endcanany
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden lg:flex sm:items-center sm:ms-6">
                @guest
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Inicia Sesion') }}
                        </x-nav-link>
                        
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Crear una Cuenta') }}
                        </x-nav-link>
                    </div>    
                @endguest
                <x-dropdown align="right" width="48">
                    @auth
                        <x-slot name="trigger">
                            
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            
                            
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Cerrar Sesion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    @endauth
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @canany(['admin', 'autor', 'user'])
                <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                    {{ __('Inicio') }}
                </x-responsive-nav-link>
            @endcanany
            @canany(['admin', 'autor'])
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endcanany
            @can('admin')
                <x-responsive-nav-link :href="route('employees.index')" :active="request()->routeIs('employees.index')">
                    {{ __('Autores') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')">
                    {{ __('Categorias') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                    {{ __('Post') }}
                </x-responsive-nav-link>
            @endcan
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Cerrar Sesion') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth
            @guest
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Iniciar sesion') }}
                    </x-responsive-nav-link>
                    
                    <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Crear una Cuenta') }}
                    </x-responsive-nav-link>
                </div>
            @endguest
            
        </div>
    </div>
</nav>
