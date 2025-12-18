<div>
    <div class="grid grid-cols-1 gap-1 justify-center p-5">
        @forelse ($categories as $categorie)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="flex flex-col">
                <p><strong>Nombre:</strong> {{ $categorie->name }}</p>                                                                
                <p><strong>Slug:</strong> {{ $categorie->slug }}</p>                                                                
                <p><strong>Categoria Creada El Dia:</strong> {{$categorie->created_at->format('d/m/Y')}}</p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch gap-3 mt-3 md:mt-0">
                <a href="{{ route('employees.edit', $categorie->id)}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold text-center cursor-pointer">Editar</a>
                <button wire:click="$dispatch('mostrarAlerta', {{ $categorie->id }})" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">Eliminar</button>
            </div>
        </div>
        @empty
            <p>No hay autores registrados</p>
        @endforelse
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    <script>
        document.addEventListener('livewire:initialized', () => { 
            Livewire.on('mostrarAlerta', (categoryId) => {
                Swal.fire({
                        title: 'Quieres Eliminar Esta Categoria?',
                        text: "La Categoria Se Eliminara y No Podra Recuperarse",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Eliminar',
                        cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminarCategory', {category: categoryId})
                        Swal.fire(
                        'Eliminado',
                        'Esta Ctegoria Se Elimino Correctamente.',
                        'success'
                        )
                    }
                })
            })
        })
    </script>    
@endpush