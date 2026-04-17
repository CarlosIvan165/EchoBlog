<div>
    <div class="m-6">
        <h2 class="text-xl font-bold text-center mb-4">Autores destacados</h2>

        <div class="grid grid-cols-2 lg:grid-cols-3">
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
</div>