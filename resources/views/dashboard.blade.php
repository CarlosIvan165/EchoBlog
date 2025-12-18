<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex">
                    @can('admin')
                        <nav class="flex">
                            <div class="">
                                <h1 class="font-bold text-2xl">Acessos Rapidos:</h1>
                                <div class="grid grid-cols-2 gap-2 md:grid-cols-3 text-gray-900 ">
                                    @livewire('post.new-post')
                                    @livewire('employee.nuevo-empleado')
                                    @livewire('category.nueva-category')
                                </div>
                            </div>
                        </nav>    
                    @endcan                    
                </div>
                <div class="p-6 text-gray-900 flex flex-col gap-4">
                    <h1 class="font-bold text-2xl">Informacion</h1>
                    @livewire('dashboard-view')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
