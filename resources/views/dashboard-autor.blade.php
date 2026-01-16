<x-app-layout>

    <div class="max-w-[1750px] mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <!-- TÍTULO -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
            <p class="text-gray-500 text-sm">Resumen general</p>
        </div>
        @livewire('autor.dashboard-contador')
        @livewire('mostrar-alerta')
        <!-- CONTENIDO PRINCIPAL -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- ACCESOS RÁPIDOS -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="font-semibold text-lg mb-4">Accesos rápidos</h2>
                <div class="flex lg:flex-col gap-3">
                    @livewire('post.new-post')
                    @livewire('category.nueva-category')
                    @livewire('employee.nuevo-empleado')
                </div>
            </div>

            <!-- INFO / TABLA / GRAFICAS -->
            <div class="lg:col-span-3 bg-white rounded-lg shadow p-6">
                @livewire('dashboard-view')
            </div>
        </div>
    </div>

</x-app-layout>