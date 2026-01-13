<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenido a Echo<strong>Blog</strong>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-[1750px] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @livewire('index.nav-categorias')
                <div class="grid grid-cols-3">
                    <div class="col-span-2">
                        @livewire('index.post-destacado')
                        @livewire('index-post')
                    </div>
                    <div>
                        @livewire('index.autores-destacados')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>