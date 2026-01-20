<div>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-5">
            <p class="text-sm text-gray-500">Total de Posts</p>
            <p class="text-2xl font-bold">{{$post}}</p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-5">
            <p class="text-sm text-gray-500">Publicados</p>
            <p class="text-2xl font-bold">{{$public}}</p>
        </div>

        <div class="bg-white rounded-lg shadow p-5">
            <p class="text-sm text-gray-500">Borrador</p>
            <p class="text-2xl font-bold">{{$draft}}</p>
        </div>

        <div class="bg-white rounded-lg shadow p-5">
            <p class="text-sm text-gray-500">Likes</p>
            <p class="text-2xl font-bold">{{$likes}}</p>
        </div>

    </div>
</div>
