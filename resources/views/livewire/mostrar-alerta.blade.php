<div>
    @if (session()->has('mensaje'))
        <div class="bg-green-100 border-l-4 border-green-600 text-green-600 p-2 my-3">
            {{ session('mensaje')}}
        </div>
    @endif
</div>
