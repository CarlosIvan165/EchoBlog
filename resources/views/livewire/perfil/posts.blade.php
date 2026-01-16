<div>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @forelse ($posts as $post)
            <div class="p-3 bg-white border-b border-gray-200 md:flex md:items-center">
                <div class="flex flex-col w-full">
                    <div class="w-full overflow-hidden rounded">
                        <a class="cursor-pointer" href="{{ route('posts.show', $post->id) }}">
                            <img class="w-full h-full object-cover" src="{{ asset('storage/post/'. $post->imagen)}}" alt="{{'imagen cavantes'. $post->titulo}}">
                        </a>
                    </div>
                    <div class="w-full md:w-90">
                        <p class="text-lg font-semibold truncate max-w-md">{{ $post->titulo }}</p>
                        <p class="text-gray-500 text-sm"><strong>Autor:</strong> {{ $post->user->name }}</p>
                        <p class="text-gray-600 line-clamp-3 mt-1">{{ $post->descripcion }}</p>
                    </div>
                    <div class="flex justify-between">
                        <div class="my-2">
                            <a href="{{ route('posts.show', $post->id) }}" class="bg-blue-600 py-2 px-4 rounded-lg text-white text-sm font-bold text-center cursor-pointer">Leer Publicación</a>
                        </div>
                    </div>
                    
                </div>
            </div>    
        @empty
            <p class="p-10">No hay posts registrados</p>
        @endforelse
    </div>
    {{ $posts->links() }}
</div>
