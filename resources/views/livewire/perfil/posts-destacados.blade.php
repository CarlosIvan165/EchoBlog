<div class="p-3">
    @forelse ($posts as $post)
    <div class="p-2 w-[450px]">
        <div class="w-full overflow-hidden rounded">
            <a class="cursor-pointer" href="{{ route('posts.show', $post->id) }}">
                <img class="w-96 h-full object-cover" src="{{ asset('storage/post/'. $post->imagen)}}" alt="{{'imagen cavantes'. $post->titulo}}">
            </a>
        </div>
        <div class="w-full py-2">
            <p class="text-lg font-semibold truncate max-w-md">{{ $post->titulo }}</p>
            <p class="text-gray-500 text-sm"><strong>Autor:</strong> {{ $post->user->name }}</p>
            <p class="text-gray-600 line-clamp-1 mt-1">{{ $post->descripcion }}</p>
            <p class="text-gray-800">{{ $post->created_at->diffForHumans() }}</p>
        </div>
        <div class="flex justify-between">
            <div class="my-2">
                <a class="bg-blue-600 py-2 px-4 rounded-lg text-white text-sm font-bold text-center cursor-pointer" href="{{ route('posts.show', $post->id) }}">Leer Publicación</a>
            </div>          
        </div>
    </div>
    @empty
        <p>No hay Posts destacados</p>
    @endforelse
</div>
