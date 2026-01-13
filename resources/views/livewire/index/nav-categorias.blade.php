<div class="justify-center mx-5">
    <nav class="flex felx-col gap-3 my-5">
        <h1 class="font-bold text-2xl">Categorias</h1>

        <div class="flex px-2 gap-3 text-gray-900 flex-wrap">
            <button
                wire:click="$set('categoryId', null)"
                class="bg-gray-300 text-gray-800 px-3 py-2 rounded shadow cursor-pointer hover:bg-indigo-700 hover:text-white transition">
                Todas
            </button>

            @foreach ($categories as $categoria)
                <button
                    wire:click="$set('categoryId', {{ $categoria->id }})"
                    class="px-3 py-2 rounded shadow cursor-pointer hover:bg-indigo-700 transition
                    {{ $categoryId === $categoria->id ? 'bg-indigo-600 text-white' : 'bg-indigo-500 text-white' }}">
                    {{ $categoria->name }}
                </button>
            @endforeach
        </div>
    </nav>
</div>
