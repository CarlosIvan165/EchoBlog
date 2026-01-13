<?php

namespace App\Livewire\Index;

use Livewire\Component;
use App\Models\Category;

class NavCategorias extends Component
{
    public $categoryId = null;
    public function render()
    {
        return view('livewire.index.nav-categorias',[
            'categories' => Category::all(),
        ]);
    }
}
