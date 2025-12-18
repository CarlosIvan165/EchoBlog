<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edicion de Autores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav class="flex gap-3">
                        <div class="p-6 text-gray-900">
                            <a class="p-3 rounded-lg bg-indigo-500 text-white shadow-xl cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105" href="{{ route('posts.index') }}">Regresar</a>
                        </div>
                    </nav>
                    @livewire('mostrar-alerta')
                    <h1 class="text-2xl font-bold text-center mt-10">Editar Autor: {{ $user->name}}</h1>
                    <div class="md:justify-center p-5">
                        <livewire:employee.editar-employee 
                            :user="$user"
                        />
                    </div>
                </div>                
            </div>
        </div>
    </div>
</x-app-layout>