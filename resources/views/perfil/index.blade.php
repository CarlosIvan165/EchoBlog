<x-app-layout>
    <div>
        <div class="max-w-[1750px] mx-auto sm:px-6 lg:px-8">
            <div class="px-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full mx-auto">
                    <!-- PORTADA -->
                    <div class="relative w-full h-64 md:h-80 lg:h-96 overflow-hidden rounded-b-xl">
                        @if(Auth::user()->portada)
                            <img src="{{ asset('storage/' . Auth::user()->portada) }}" class="w-full h-full object-cover mt-2">
                        @endif
                        <div class="absolute inset-0 bg-black/30"></div>
                    </div>

                    <!-- PERFIL -->
                    <div class="relative px-6">
                        <div class="flex flex-col md:flex-row md:items-end gap-4 -mt-16">
                            <!-- Avatar -->
                                <img src="{{ asset('storage/' . $user->avatar) }}" class="w-32 h-32 md:w-36 md:h-36 rounded-full border-4 border-white object-cover shadow-lg bg-white">

                            <div class="flex-1 flex flex-col md:flex-row md:items-end md:justify-between">

                                <div>
                                    <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
                                    @if($user->username)
                                        <p class="text-gray-500">{{ '@' . $user->username }}</p>
                                    @endif
                                    
                                </div>

                                <div class="grid content-center">
                                    @canany(['autor', 'admin'])
                                        <a class="px-4 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition" href="{{route('profile.edit')}}">Editar perfil</a>    
                                    @endcanany
                                    
                                    @can('user')
                                        <a class="px-4 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition" href="">Seguir</a>
                                    @endcan
                                </div>
                                
                            </div>
                        </div>
                        <!-- DESCRIPCIÓN -->
                        <div class="mt-6 my-10">
                            <p class="text-gray-700 leading-relaxed">
                                {{ $user->bio }}
                            </p>
                        </div>
                    </div>
                </div>

                <div>
                    <div x-data="{ tab: 'posts' }">

                        <nav class="bg-white border-b border-gray-300">
                            <div class="max-w-xl mx-auto px-4 sm:px-10 lg:px-8">
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                                    <button @click="tab = 'posts'"
                                        :class="tab === 'posts'
                                            ? 'border-b-2 border-black text-black'
                                            : 'text-gray-500'"
                                        class="text-xl inline-flex items-center pb-3 font-medium leading-5 transition duration-150 ease-in-out">
                                        Posts
                                    </button>
                                    <button @click="tab = 'about'"
                                        :class="tab === 'about'
                                            ? 'border-b-2 border-black text-black'
                                            : 'text-gray-500'"
                                        class="text-xl inline-flex items-center pb-3 font-medium leading-5 transition duration-150 ease-in-out">
                                        Acerca de mí
                                    </button>
                                </div>
                            </div>
                        </nav>

                        <div class="mt-6">
                            <div x-show="tab === 'posts'">
                                <div class="grid grid-cols-3">
                                    <div class="col-span-2">
                                        @livewire('perfil.posts', [
                                            'user' => $user
                                        ])
                                    </div>
                                    <div>
                                        <div>
                                            <div class="border-black">
                                                <h1 class="text-xl inline-flex items-center pb-3 font-medium leading-5">Post destacados</h1>
                                            </div>
                                            @livewire('perfil.posts-destacados', [
                                                'user' => $user
                                            ])
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-show="tab === 'about'">
                                <div class="grid grid-cols-3">
                                    <div class="col-span-2">
                                        <p>hola 2</p>
                                    </div>
                                    <div>
                                        @livewire('index.autores-destacados')
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>