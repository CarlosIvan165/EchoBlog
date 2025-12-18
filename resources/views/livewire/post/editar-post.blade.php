
<form action="" class="space-y-5" wire:submit.prevent='editarPost' novalidate>
    @csrf
    <!-- vacante Address -->
    <div>
        <x-input-label for="titulo" :value="__('Titulo Del Post')" />
        <x-text-input wire:model="titulo" id="titulo" class="block mt-1 w-full" type="text" :value="old('titulo')" placeholder="Titulo Del Post"/>
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>
    
    <div>
        <x-input-label for="category" :value="__('Categoria')" />
        <select wire:model="category" id="category" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="">-- Selecciona La Categoria --</option>
            @foreach ($categories as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="status" value="Estado del Post" />
        <select wire:model="status"
            class="border-gray-300 rounded-md shadow-sm w-full">
            <option value="">-- Selecciona una opcion--</option>
            <option value="1">Publicado</option>
            <option value="0">Borrador</option>
        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripcion Del Post')" />
        <textarea wire:model="descripcion" id="descripcion" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm h-72" placeholder="Descripcion General del Post"></textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

    <div>
        <x-input-label :value="__('Imagen')" />
        <x-text-input wire:model="imagen_nueva" id="imagen_nueva" class="block mb-5 w-full" type="file" accept="image/*"/>
        <x-input-error :messages="$errors->get('imagen_nueva')" class="mt-2" />

        <div class="flex gap-6">
            <div class="my-5 w-80 justify-center">
                <x-input-label :value="__('Imagen Actual')" />
                <img src="{{ asset('storage/post/'. $imagen) }}" alt="{{ 'Imagen Vacante' . $titulo }}">
            </div> 
            <div class="my-5 w-80">
                @if ($imagen_nueva)
                    <x-input-label :value="__('Imagen Nueva')" />
                        <img src="{{ $imagen_nueva->temporaryURL() }}">
                @endif
            </div>
        </div>
    </div>
            
    <x-primary-button>
        Guardar Cambios
    </x-primary-button>
</form>

