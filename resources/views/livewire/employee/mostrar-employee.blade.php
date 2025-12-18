<div>
    <div class="grid grid-cols-1 gap-1 justify-center p-5">
        @forelse ($users as $user)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="flex flex-col">
                <p><strong>Nombre:</strong> {{ $user->name }}</p>                                                                
                <p><strong>Cuenta Creada el Dia:</strong> {{$user->created_at->format('d/m/Y')}}</p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch gap-3 mt-3 md:mt-0">
                <a href="{{ route('employees.edit', $user->id)}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold text-center cursor-pointer">Editar</a>
                <button wire:click="$dispatch('mostrarAlerta', {{ $user->id }})" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">Eliminar</button>
            </div>
        </div>
        @empty
            <p>No hay autores registrados</p>
        @endforelse
        {{ $users->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    <script>
        document.addEventListener('livewire:initialized', () => { 
            Livewire.on('mostrarAlerta', (userId) => {
                Swal.fire({
                        title: 'Quieres Eliminar a Este Autor?',
                        text: "EL Autor Se Eliminara y No Podra Recuperarse",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Eliminar',
                        cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminarUser', {user: userId})
                        Swal.fire(
                        'Eliminado',
                        'Este Autor Se Elimino Correctamente.',
                        'success'
                        )
                    }
                })
            })
        })
    </script>    
@endpush
