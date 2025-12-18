<div class="">
    <button wire:click="openModal" class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105">
        Nuevo Post
    </button>

    @if ($open)
        <div class="fixed inset-0 bg-black/75 flex items-center justify-center z-50">
            <div class="bg-white p-4 rounded shadow-lg max-w-2xl w-full">
                <div class="">
                    <button wire:click="closeModal" class=" text-black rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div> 
                <h2 class="text-xl font-semibold mb-4">Crea Un Nuevo Post</h2>
                <form action="" class="space-y-5" wire:submit.prevent='newPost' novalidate>
                    @csrf
                    <!-- vacante Address -->
                    <div>
                        <x-input-label for="titulo" :value="__('Titulo Del Post')" />
                        <x-text-input wire:model="titulo" id="titulo" class="block mt-1 w-full" type="text" :value="old('titulo')" placeholder="Titulo Vacante"/>
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
                        <x-input-label for="imagen" :value="__('Imagen')" />
                        <x-text-input wire:model="imagen" id="imagen" class="block mt-1 w-full" type="file" accept="image/*"/>
                        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                    </div>

                    {{-- <div class="my-5 w-48">
                        @if ($imagen)
                            Imange:
                            <img src="{{ $imagen->temporaryURL() }}">
                        @endif
                    </div> --}}
                    

                    <x-primary-button>
                        Crear Post
                    </x-primary-button>
                </form>
            </div>
        </div>
    @endif 
</div>
