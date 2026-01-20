<div class="">
    <button wire:click="openModal" class="p-3 rounded-lg bg-indigo-500 text-[#EBDFC9] shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105">
        Nuevo Autor
    </button>

    @if ($open)
        <!-- OVERLAY -->
        <div class="fixed inset-0 bg-black/60 flex items-center justify-center z-50" wire:click.self="closeModal">

            <!-- MODAL -->
            <div class="bg-white rounded-xl shadow-xl w-full max-w-lg mx-4
                        flex flex-col max-h-[90vh] overflow-hidden">

                <!-- HEADER -->
                <div class="flex items-center justify-between px-6 py-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">
                        Crear nuevo autor
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

                    <form wire:submit.prevent="createAutor" class="space-y-5" novalidate>

                        <!-- NAME -->
                        <div>
                            <x-input-label for="name" value="Nombre" />
                            <input
                                wire:model.defer="name"
                                id="name"
                                type="text"
                                placeholder="Nombre completo"
                                class="mt-1 block w-full rounded-md border-gray-300
                                    focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
                            <x-input-error :messages="$errors->get('name')" />
                        </div>

                        <!-- USERNAME -->
                        <div>
                            <x-input-label for="username" value="Nombre de usuario" />
                            <input
                                wire:model.defer="username"
                                id="username"
                                type="text"
                                placeholder="usuario123"
                                class="mt-1 block w-full rounded-md border-gray-300
                                    focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
                            <x-input-error :messages="$errors->get('username')" />
                        </div>

                        <!-- EMAIL -->
                        <div>
                            <x-input-label for="email" value="Correo electrónico" />
                            <input
                                wire:model.defer="email"
                                id="email"
                                type="email"
                                placeholder="correo@ejemplo.com"
                                class="mt-1 block w-full rounded-md border-gray-300
                                    focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
                            <x-input-error :messages="$errors->get('email')" />
                        </div>

                        <!-- PASSWORD -->
                        <div>
                            <x-input-label for="password" value="Contraseña" />
                            <input
                                wire:model.defer="password"
                                id="password"
                                type="password"
                                placeholder="********"
                                class="mt-1 block w-full rounded-md border-gray-300
                                    focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
                            <x-input-error :messages="$errors->get('password')" />
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div>
                            <x-input-label for="password_confirmation" value="Confirmar contraseña" />
                            <input
                                wire:model.defer="password_confirmation"
                                id="password_confirmation"
                                type="password"
                                placeholder="********"
                                class="mt-1 block w-full rounded-md border-gray-300
                                    focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" />
                            <x-input-error :messages="$errors->get('password_confirmation')" />
                        </div>

                        <!-- FOOTER -->
                        <div class="flex justify-end gap-3 pt-4 border-t">
                            <button
                                type="button"
                                wire:click="closeModal"
                                class="px-4 py-2 rounded-md border text-gray-700
                                    hover:bg-gray-100 transition">
                                Cancelar
                            </button>

                            <x-primary-button>
                                Crear autor
                            </x-primary-button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

    @endif 
</div>
