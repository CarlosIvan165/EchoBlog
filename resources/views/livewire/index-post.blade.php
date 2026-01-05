<div class="justify-center">
    <nav class="flex felx-col gap-3">
        <h1 class="font-bold text-2xl">Categorias</h1>

        <div class="flex px-2 gap-3 text-gray-900 flex-wrap">
            <button
                wire:click="$set('categoryId', null)"
                class="bg-gray-300 text-gray-800 px-3 py-2 rounded shadow cursor-pointer hover:bg-indigo-700 hover:text-white transition">
                Todas
            </button>

            @foreach ($category as $categoria)
                <button
                    wire:click="$set('categoryId', {{ $categoria->id }})"
                    class="px-3 py-2 rounded shadow cursor-pointer hover:bg-indigo-700 transition
                    {{ $categoryId === $categoria->id ? 'bg-indigo-600 text-white' : 'bg-indigo-500 text-white' }}">
                    {{ $categoria->name }}
                </button>
            @endforeach
        </div>
    </nav>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @forelse ($posts as $post)
            <div class="p-3 bg-white border-b border-gray-200 md:flex md:items-center">
                <div class="flex flex-col w-7xl">
                    <div class="w-full md:w-96 md:h-96 overflow-hidden rounded">
                        <a class="cursor-pointer" href="{{ route('posts.show', $post->id) }}">
                            <img class="w-full h-full object-cover" src="{{ asset('storage/post/'. $post->imagen)}}" alt="{{'imagen cavantes'. $post->titulo}}">
                        </a>
                    </div>
                    <div class="w-full md:w-80">
                        <p class="text-lg font-semibold truncate max-w-md">{{ $post->titulo }}</p>
                        <p class="text-gray-500 text-sm"><strong>Autor:</strong> {{ $post->user->name }}</p>
                        <p class="text-gray-600 line-clamp-2 mt-1">{{ $post->descripcion }}</p>
                    </div>
                    <div class="my-2">
                        <a href="{{ route('posts.show', $post->id) }}" class="bg-blue-600 py-2 px-4 rounded-lg text-white text-sm font-bold text-center cursor-pointer">Ver Post</a>
                    </div>                
                </div>
            </div>    
        @empty
            <p>No hay posts registrados</p>
        @endforelse
    </div>
    {{ $posts->links() }}
</div>
