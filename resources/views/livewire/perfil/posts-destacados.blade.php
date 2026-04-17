<div class="">
    @if ($layout === 'horizontal')
        <div>
            <p class="text-xl font-bold text-center mb-4">Publicaciones Destacadas</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($posts as $post)
                    <a href="{{ route('posts.show', $post->id) }}"
                    class="group block">

                        <div class="flex gap-4 items-start">

                            <!-- Imagen -->
                            <div class="w-28 h-20 flex-shrink-0 overflow-hidden rounded-lg">
                                <img
                                    src="{{ asset('storage/post/'.$post->imagen) }}"
                                    alt="{{ $post->titulo }}"
                                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                                >
                            </div>

                            <!-- Texto -->
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold leading-snug line-clamp-2 group-hover:underline">
                                    {{ $post->titulo }}
                                </p>

                                <p class="text-gray-600 text-xs line-clamp-2 mt-1">
                                    {{ $post->descripcion }}
                                </p>

                                <p class="text-gray-400 text-xs mt-2">
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            </div>

                        </div>
                    </a>
                @empty
                    <p>No hay post destacados</p>
                @endforelse
            </div>
            <hr class="my-2 border-gray-200">
        </div>
    @else
        <div>
            <p class="text-xl font-bold text-center mb-4">Publicaciones Destacadas</p>
            <div class="space-y-6">
                @forelse ($posts as $post)
                    <a href="{{ route('posts.show', $post->id) }}"class="group block">
                        <article class="space-y-3">

                            <!-- Imagen -->
                            <div class="w-full h-40 overflow-hidden rounded-lg">
                                <img
                                    src="{{ asset('storage/post/'.$post->imagen) }}"
                                    alt="{{ $post->titulo }}"
                                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                                >
                            </div>

                            <!-- Texto -->
                            <div>
                                <p class="text-sm font-semibold leading-snug line-clamp-2 group-hover:underline">
                                    {{ $post->titulo }}
                                </p>

                                <p class="text-gray-600 text-xs line-clamp-2 mt-1">
                                    {{ $post->descripcion }}
                                </p>

                                <p class="text-gray-400 text-xs mt-2">
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            </div>

                        </article>
                    </a>
                @empty
                    <p>No hay Posts destacados</p>
                @endforelse
            </div>
        </div>
    @endif
    
</div>
