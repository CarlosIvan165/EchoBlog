<div class="p-5">
    <nav class="flex gap-3">
        <div class="p-6 text-gray-900">
            @guest
                <a class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105" href="{{ route('index') }}">Regresar</a>
            @endguest
            @can('user')
                <a class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105" href="{{ route('index') }}">Regresar</a>
            @endcan
            @can('admin')
                <a class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105" href="{{ route('index') }}">Regresar</a>
                <a class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105" href="{{ route('dashboard.admin') }}">Regresar al panel</a>
            @endcan
            @can('autor')
                <a class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105" href="{{ route('index') }}">Regresar</a>
                <a class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105" href="{{ route('dashboard.admin') }}">Regresar al panel</a>
            @endcan
        </div>
    </nav>
    
    <div class="grid gap-3">

        <div class="w-full mx-auto">
            <div class="relative w-full h-[260px] sm:h-[320px] md:h-[380px] lg:h-[460px] overflow-hidden rounded-b-2xl">

                <!-- Imagen -->
                <img
                    src="{{ asset('storage/post/'.$post->imagen) }}"
                    alt="{{ $post->titulo }}"
                    class="absolute inset-0 w-full h-full object-cover object-[50%_15%] transition-transform duration-700 scale-105"
                >

                <!-- Overlay degradado -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>

                <div class="absolute bottom-6 left-6 right-6 text-white">
                    <h1 class="text-2xl md:text-4xl font-bold leading-tight">
                        {{ $post->titulo }}
                    </h1>
                </div>
            </div>
        </div>

        <div>
            <div class="mb-5">
                <div class="flex gap-2.5 items-center justify-between">
                    <a href="{{ route('perfil.index', $post->user) }}">
                        <div class="flex gap-2.5 items-center">
                            <img class="w-[70px] h-[70px] rounded-full mt-2 border border-gray-900" src="{{ asset('storage/'.$post->user->avatar)}}" alt="{{'imagen de avatar'}}">
                            <div>
                                <p class="font-bold text-lg">{{ $post->user->name }}</p>
                                <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                            </div>   
                        </div>
                    </a>
                    
                    <div class="my-5 flex">
                        @auth
                            <livewire:like-post :post="$post" />
                            <livewire:comentario-post :post="$post" />
                        @endauth
                    </div>                  
                </div>
            </div>
            <hr class="my-6 border-gray-500">

            <div class="grid grid-cols-1 xl:grid-cols-[2fr_1fr]">
                <div class="">
                    <p class="whitespace-pre-wrap text-gray-700 leading-7 text-[17px]">{{ $post->descripcion }}</p>
                </div>
                <div class="p-5">
                    <div class="border-gray-400 hidden xl:block">
                        <div class="">
                            <h1 class="text-xl inline-flex text-center pb-3 font-medium leading-5">Acerca Del Autor</h1>
                        </div>
                        <div class="flex gap-2.5 items-center">
                            <img class="w-[50px] h-[50px] rounded-full mt-2 border border-gray-900" src="{{ asset('storage/'.$post->user->avatar)}}" alt="{{'imagen de avatar'}}">
                            <div>
                                <p>{{ $post->user->name }}</p>
                                <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                            </div>   
                        </div>
                        <div class="p-3">
                            <p>{{ $post->user->bio }}</p>
                        </div>
                        <hr class="my-2 border-gray-500">                            
                    </div>
                    <div class="hidden lg:block">
                        <div class="">
                            <h1 class="text-xl inline-flex text-center pb-3 font-medium leading-5">Mas Publiaciones Del Autor</h1>
                        </div>
                        <div class="hidden xl:block">
                            @livewire('perfil.posts-destacados', [
                                'user' => $post->user,
                                'layout' => 'vertical'
                            ])
                        </div>                        
                    </div>
                    <hr class="my-2 border-gray-500">
                    <div>
                        <div class="xl:hidden mb-6">
                            @livewire('perfil.posts-destacados', [
                                'user' => $post->user,
                                'layout' => 'horizontal'
                            ])
                        </div>
                        @auth
                            <div>
                                <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
                                @if(session('mensaje'))
                                    <div class="bg-green-100 border-l-4 border-green-600 text-green-600 p-2 my-3">
                                        {{session('mensaje')}}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('comentario.store', ['post'=>$post, auth()->user()]) }}">
                                    @csrf
                                    <div class="mb-5">
                                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade un Comentario</label>
                                        <textarea name="comentario" id="comentario" placeholder="Agrega un Comentario" class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"></textarea>
                                        @error('comentario')
                                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <input type="submit" value="Comentar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-b-lg">
                                </form>    
                            </div>
                        @endauth

                        <div class="bg-white shadow mt-5 mb-5 max-h-96 overflow-y-scroll">
                            @forelse ($comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <p class="font-bold">{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{ $comentario->user->name }}
                                    ·
                                    {{ $comentario->created_at->diffForHumans() }}
                                </p>
                            </div>
                            @empty
                                <p class="text-gray-500">Aún no hay comentarios.</p>
                            @endforelse
                        </div>
                        
                        @guest
                            <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
                                <p>
                                    ¿Deseas comentar en este post?? <a href="{{ route('register')}}" class="font-bold text-indigo-600">Obten una cuenta y podras comentar lo que desees</a>
                                </p>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>