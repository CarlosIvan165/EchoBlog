<div class="justify-center mx-5">
    <div>
        <a class="cursor-pointer" href="{{ route('posts.show', $post->id) }}">
            <img class="w-full h-full object-cover" src="{{ asset('storage/post/'. $post->imagen)}}" alt="{{'imagen cavantes'. $post->titulo}}">
        </a>
        <p class="text-lg font-semibold">{{ $post->titulo }}</p>
        <p class="text-gray-600 line-clamp-2 mt-1">{{ $post->descripcion }}</p>
        <div class="flex justify-between">
            <div class="text-md my-3">
                @if($post->user)
                    <a href="{{ route('perfil.index', $post->user->id) }}">
                        <strong>Autor:</strong> {{ $post->user->name }}
                        <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                    </a>
                @else
                    <p><strong>Autor:</strong> Sin autor</p>
                @endif
                
            </div>
    
           <div class="flex my-3">
                @auth
                    <livewire:like-post :post="$post" />
                    <livewire:comentario-post :post="$post" />
                @endauth 
           </div>
            
        </div>
    </div>
    
</div>
