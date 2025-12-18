<form action="" class="space-y-5" wire:submit.prevent='editarUser' novalidate>
    @csrf
    <!-- vacante Address -->
    <div>
        <x-input-label for="name" :value="__('Nombre Del Autor')" />
        <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" :value="old('titulo')" placeholder="Titulo Vacante"/>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    
    <div>
        <x-input-label for="email" :value="__('Email Del Autor')" />
        <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" :value="old('titulo')" placeholder="Titulo Vacante"/>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
            
    <x-primary-button>
        Guardar Cambios
    </x-primary-button>
</form>