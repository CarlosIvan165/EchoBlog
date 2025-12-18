<div>
    <div class="grid grid-cols-1 gap-1 justify-center p-5">
        @forelse ($posts as $post)
        <div class="p-3 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="flex flex-col">
                <p class="truncate w-96"><strong>Titulo del Post:</strong> {{ $post->titulo }}</p>
                @can('admin')
                    <p class="text-gray-500"><strong>Autor:</strong> {{ $post->user->name }}</p>    
                @endcan                                                
                <p><strong>Creada el dia:</strong> {{$post->created_at->format('d/m/Y')}}</p>
                <p class="{{ $post->status === 1 ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }} p-1">{{ $post->statusLabel() }}</p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch gap-3 mt-3 md:mt-0">
                <a href="{{ route('posts.edit', $post->id)}}" class="bg-blue-600 py-2 px-4 rounded-lg text-white text-sm font-bold text-center cursor-pointer">Editar</a>
                <a href="{{ route('posts.show', $post->id, )}}" class="bg-green-600 py-2 px-4 rounded-lg text-white text-sm font-bold text-center cursor-pointer">Ver Post</a>
                <button wire:click="$dispatch('mostrarAlerta', {{ $post->id }})" class="bg-red-600 py-2 px-4 rounded-lg text-sm text-white font-bold text-center">
                    Eliminar
                </button>
            </div>
        </div>
            
        @empty
            <p>No hay posts registrados</p>
        @endforelse
        {{ $posts->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    <script>
        document.addEventListener('livewire:initialized', () => { 
            Livewire.on('mostrarAlerta', (postId) => {
                Swal.fire({
                        title: 'Quieres eliminar este post?',
                        text: "El Post Se Eliminara y No Podra Recuperarse",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Eliminar',
                        cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminarPost', {post: postId})
                        Swal.fire(
                        'Eliminado',
                        'Este Post se elimino correctamente.',
                        'success'
                        )
                    }
                })
            })
        })
    </script>    
@endpush
