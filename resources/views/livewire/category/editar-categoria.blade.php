<div>
    <form action="" class="space-y-5" wire:submit.prevent='editarCategory' novalidate>
        @csrf
        <!-- vacante Address -->
        <div>
            <x-input-label for="name" :value="__('Nombre Del Autor')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" :value="old('name')" placeholder="Titulo Vacante"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        
        <div>
            <x-input-label for="slug" :value="__('slug Del Autor')" />
            <x-text-input wire:model="slug" id="slug" class="block mt-1 w-full" type="text" :value="old('slug')" placeholder="Titulo Vacante"/>
            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
        </div>
                
        <x-primary-button>
            Guardar Cambios
        </x-primary-button>
    </form>
</div>
