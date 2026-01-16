<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edicion de Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav class="flex gap-3">
                        <div class="p-6 text-gray-900">
                            @can('admin')
                                <a class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105" href="{{ route('dashboard.admin') }}">Regresar</a>
                            @endcan
                            @can('autor')
                                
                            @endcan 
                        </div>
                    </nav>
                    @livewire('mostrar-alerta')
                    <h1 class="text-2xl font-bold text-center mt-10">Editar Autor: {{ $category->name}}</h1>
                    <div class="md:justify-center p-5">
                        <livewire:category.editar-categoria 
                            :category="$category"
                        />
                    </div>
                </div>                
            </div>
        </div>
    </div>

</x-app-layout>