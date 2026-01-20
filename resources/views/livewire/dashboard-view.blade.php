<div>
    <div class="overflow-y-hidden mb-6"><!-- transition-transform duration-300 ease-in-out hover:scale-105 -->
        <h1 class="font-bold text-2xl snap-y scroll-pl-6">Post Registrados</h1>
        @livewire('post.mostrar-posts')
    </div>

    @can('admin')
        <div class="grid md:grid-cols-2 gap-3">
            <div class="p-3 rounded-lg shadow-xl">
                <h2 class="font-bold text-2xl">Autores Registrados:</h2>
                @livewire('employee.mostrar-employee') 
            </div>
            <div class="p-3 rounded-lg shadow-xl">
                <h2 class="text-2xl font-bold mb-1">Categorias Registradas:</h2>
                @livewire('category.mostrar-ctaegory')
            </div>
        </div>    
    @endcan
</div>
