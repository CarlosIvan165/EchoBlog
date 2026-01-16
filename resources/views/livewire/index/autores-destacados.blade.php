<div>
    @if ($layout === 'horizontal')
        <div class="m-6">
            <h2 class="text-lg font-semibold mb-4">
                Autores destacados
            </h2>

            <div class="flex gap-6 overflow-x-auto pb-2">
                @forelse ($admins as $admin)
                    <a
                        class="group min-w-[220px] flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition"
                    >
                        <!-- Avatar -->
                        <div class="w-12 h-12 overflow-hidden rounded-full flex-shrink-0">
                            <img
                                src="{{ asset('storage/'.$admin->avatar) }}"
                                alt="{{ $admin->name }}"
                                class="w-full h-full object-cover"
                            >
                        </div>

                        <!-- Texto -->
                        <div>
                            <p class="text-sm font-semibold leading-tight group-hover:underline">
                                {{ $admin->name }}
                            </p>
                            <p class="text-xs text-gray-500">
                                {{ '@' . $admin->username }}
                            </p>
                        </div>
                    </a>
                @empty
                    <p>No hay autores destacados</p>
                @endforelse
            </div>
        </div>
    @else
        <h2 class="text-xl font-semibold mb-4">Autores Destacados</h2>

        <div class="space-y-6">
            @foreach ($admins as $admin)
                <div class="flex items-center gap-3">
                    <!-- Avatar -->
                    <img
                        class="w-12 h-12 rounded-full object-cover"
                        src="{{ asset('storage/'.$admin->avatar) }}"
                        alt="Avatar de {{ $admin->name }}"
                    >

                    <!-- Texto -->
                    <div>
                        <p class="font-medium leading-tight">
                            {{ $admin->name }}
                        </p>
                        <p class="text-sm text-gray-500">
                            Registrado el {{ $admin->created_at->translatedFormat('d F Y') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div> 
    @endif
    
</div>