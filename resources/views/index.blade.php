<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenido a Echo<strong>Blog</strong>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-[1750px] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="xl:hidden">
                    @livewire('index.autores-destacados', [
                        'layout' => 'horizontal'
                    ])
                    @livewire('index.post-destacados', [
                        'layout' => 'horizontal'
                    ])
                </div>
                <div class="grid grid-cols-1 xl:grid-cols-[2fr_1fr]">
                    <div>
                        @livewire('index.post-destacado')
                        @livewire('index-post')
                    </div>
                    <div class="hidden xl:block">
                        @livewire('index.autores-destacados', [
                            'layout' => 'vertical'
                        ])
                        @livewire('index.post-destacados', [
                            'layout' => 'vertical'
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>