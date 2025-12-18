<div class="">
    <button wire:click="openModal" class="p-3 rounded-lg bg-indigo-500 text-[#EBDFC9] shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105">
        Nueva Categoria
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
                <h2 class="text-xl font-semibold mb-4">Crea Una Nueva Categoria</h2>
                <form action="" class="space-y-5" wire:submit.prevent='createCategory' novalidate>
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nombre De La Categoria')" />
                        <input type="text" wire:model="name" placeholder="Ej: Lucha Libre" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="slug" :value="__('Slug De La Categoria')" />
                        <input type="text" wire:model="slug" placeholder="Ej: lucha-libre" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                    </div>

                    <x-primary-button>
                        Crear Categoria
                    </x-primary-button>
                </form>
            </div>
        </div>
    @endif 
</div>
