<div>
    @can('admin')
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-3 mb-5"><!-- transition-transform duration-300 ease-in-out hover:scale-105 -->
            <div class="p-3 rounded-lg bg-indigo-500 text-[#EBDFC9] shadow-xl">
                <h1 class="text-2xl font-bold">Post</h1>
                <p class="my-3 ">Total de Post: {{ $totalPosts }}</p>
                <p class="">Post Publicados: {{ $totalPublic }}</p>
                <p class="my-3 ">Post En borrador: {{ $totalDraft }}</p>
            </div>

            <div class="p-3 rounded-lg bg-indigo-500 text-[#EBDFC9] shadow-xl">
                <h1 class="text-2xl font-bold">Usuarios</h1>
                <p class="my-3">Total De Usuarios Registrados: {{ $total }}</p>
                <p class="">Administradores: {{ $totalAdmin }}</p>
                <p class="my-3 ">Escritores: {{ $totalWriter }}</p>
                <p class="">Usuarios: {{ $totalUsers }}</p>
            </div>
            <div class="p-3 rounded-lg bg-indigo-500 text-[#EBDFC9] shadow-xl">
                <h1 class="text-2xl font-bold">Actividad Reciente</h1>
            </div>
        </div>

        <!-- Ultimos registros -->
        <h1 class="font-bold text-2xl">Ultimos registros</h1>
        <div class="grid md:grid-cols-2 gap-3">
            <div class="p-3 rounded-lg bg-indigo-500 text-[#EBDFC9] shadow-xl">
                <h2 class="text-2xl font-bold mb-1">Últimos posts creados:</h2>

                @forelse ($ultimosPosts as $post)
                    <div class="mb-4">
                        <p class="md:truncate">{{ $post->titulo }}</p>
                        <div class="flex gap-3 mb-1">
                            <p><strong>Autor:</strong>  {{ $post->user->name }}</p>
                            <p><strong>Creacion:</strong> {{$post->created_at->format('d/m/Y')}}</p>
                        </div>
                        <a href="{{ route('posts.show', $post->id)}}" class="bg-green-600 py-2 px-4 rounded-lg text-white text-sm font-bold text-center cursor-pointer">Ver Post</a>
                    </div>
                @empty
                    <p class="text-gray-500">No hay posts todavía.</p>
                @endforelse
            </div>
            <div class="p-3 rounded-lg bg-indigo-500 text-[#EBDFC9] shadow-xl">
                <h2 class="text-2xl font-bold mb-1">Últimos usuarios registrados:</h2>
                @forelse ($ultimosUsers as $users)
                    <div class="mb-4">
                        <p><strong>Autor:</strong>  {{ $users->name }}</p>
                        <p><strong>Creacion:</strong> {{$users->created_at->format('d/m/Y')}}</p>                 
                    </div>
                @empty
                    
                @endforelse

            </div>
        </div>
    @endcan

    @can('autor')
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-3">
            <div class="p-3 rounded-lg bg-indigo-500 text-[#EBDFC9] shadow-xl">
                <h2 class="text-2xl font-bold mb-1">Últimos posts creados:</h2>

                @forelse ($postwriters as $postwriter)
                    <div class="mb-4">
                        <p class="md:truncate">{{ $postwriter->titulo }}</p>
                        <div class="flex gap-3 mb-1">
                            <p><strong>Creacion:</strong> {{$postwriter->created_at->format('d/m/Y')}}</p>
                        </div>
                        <a href="{{ route('posts.show', $postwriter->id)}}" class="bg-green-600 py-2 px-4 rounded-lg text-white text-sm font-bold text-center cursor-pointer">Ver Post</a>
                    </div>
                @empty
                    <p class="text-gray-500">No hay posts todavía.</p>
                @endforelse
            </div>
        </div>    
    @endcan
    
    
    
</div>
