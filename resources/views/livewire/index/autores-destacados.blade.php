<div>
    <h1>Autores Destacados</h1>
    <div class="flex items-center gap-2.5">
        @foreach($admins as $admin)
            <img class="w-[50px] h-[50px] rounded-full mt-2" src="{{ asset('storage/'.$admin->avatar)}}" alt="{{'imagen de avatar'}}">
            <div class="content-center font-medium text-heading">
                <p class="mt-2">{{ $admin->name }}</p>
                <p class="text-gray-500">Se registro el dia: {{ $admin->created_at->translatedFormat('d F Y') }}</p>
            </div>
        @endforeach
    </div>
</div>