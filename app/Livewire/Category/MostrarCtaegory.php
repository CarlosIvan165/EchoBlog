<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class MostrarCtaegory extends Component
{
    use WithPagination;

    protected $listeners = ['eliminarCategory'];

    public function eliminarCategory(Category $category){
        $category->delete();
    }

    public function render()
    {
        return view('livewire.category.mostrar-ctaegory', [
            'categories' => Category::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
