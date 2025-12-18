<div class="p-10">
    <nav class="flex gap-3">
        <div class="p-6 text-gray-900">
            @guest
                <a class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105" href="{{ route('index') }}">Regresar</a>
            @endguest
            @can('user')
                <a class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105" href="{{ route('index') }}">Regresar</a>
            @endcan
            @canany(['admin', 'autor'])
                <a class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105" href="{{ route('posts.index') }}">Regresar</a>
            @endcanany
        </div>
    </nav>
    
    <div class="mb-5">
        <h3 class="text-3xl text-gray-800 my-3 ">Titulo: <span class="font-bold">{{ $post->titulo}}</span></h3>
    </div>
    
    <div class="md:grid md:grid-cols-6 gap-3">
        <div class="md:col-span-4">
            <p class="whitespace-pre-wrap">{{$post->descripcion}}</p>
        </div>
        <div class="md:col-span-2">
            <img class="w-full" src="{{ asset('storage/post/'.$post->imagen)}}" alt="{{'imagen cavantes'. $post->titulo}}">
        </div>
    </div>
    @auth
        @if (auth()->user()->hasVerifiedEmail())
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
        @else
            <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
                <p>Verifica tu correo para Comentar.</p>
            </div>
        @endif
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
                ¿Deseas coemntar en este post?? <a href="{{ route('register')}}" class="font-bold text-indigo-600">Obten una cuenta y podras comentar lo que desees</a>
            </p>
        </div>
    @endguest
    
</div>