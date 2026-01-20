<div class="">
    <button wire:click="openModal" class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105">
        Nuevo Post
    </button>

    @if ($open)
        <!-- OVERLAY -->
        <div class="fixed inset-0 bg-black/60 flex items-center justify-center z-50" wire:click.self="closeModal">

            <!-- MODAL -->
            <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl mx-4
                        flex flex-col max-h-[90vh] overflow-hidden">

                <!-- HEADER -->
                <div class="flex items-center justify-between px-6 py-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">
                        Crear nuevo post
                    </h2>

                    <button wire:click="closeModal"
                        class="text-gray-500 hover:text-gray-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- BODY -->
                <div class="p-6 overflow-y-auto">


                    <form wire:submit.prevent="newPost" class="space-y-5" novalidate>

                        <!-- TITULO -->
                        <div>
                            <x-input-label for="titulo" value="Título del post" />
                            <x-text-input
                                wire:model.defer="titulo"
                                id="titulo"
                                type="text"
                                class="mt-1 block w-full"
                                placeholder="Título del post" />
                            <x-input-error :messages="$errors->get('titulo')" />
                        </div>

                        <!-- CATEGORIA -->
                        <div>
                            <x-input-label for="category" value="Categoría" />
                            <select
                                wire:model.defer="category"
                                id="category"
                                class="mt-1 w-full border-gray-300 rounded-md shadow-sm
                                    focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categories as $categoria)
                                    <option value="{{ $categoria->id }}">
                                        {{ $categoria->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category')" />
                        </div>

                        <!-- ESTADO -->
                        <div>
                            <x-input-label for="status" value="Estado del post" />
                            <select
                                wire:model.defer="status"
                                id="status"
                                class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Selecciona una opción</option>
                                <option value="1">Publicado</option>
                                <option value="0">Borrador</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" />
                        </div>

                        <!-- DESCRIPCION -->
                        <div>
                            <x-input-label for="descripcion" value="Descripción" />
                            <textarea
                                wire:model.defer="descripcion"
                                id="descripcion"
                                rows="6"
                                class="mt-1 w-full border-gray-300 rounded-md shadow-sm
                                    focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Descripción del post"></textarea>
                            <x-input-error :messages="$errors->get('descripcion')" />
                        </div>

                        <!-- IMAGEN -->
                        <div>
                            <x-input-label for="imagen" value="Imagen" />
                            <input
                                wire:model="imagen"
                                id="imagen"
                                type="file"
                                accept="image/*"
                                class="mt-1 block w-full text-sm text-gray-700" />
                            <x-input-error :messages="$errors->get('imagen')" />
                        </div>

                        <!-- FOOTER -->
                        <div class="flex justify-end gap-3 pt-4 border-t">
                            <button type="button"
                                wire:click="closeModal"
                                class="px-4 py-2 rounded-md border
                                    text-gray-700 hover:bg-gray-100">
                                Cancelar
                            </button>

                            <x-primary-button>
                                Crear post
                            </x-primary-button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    @endif 
</div>
