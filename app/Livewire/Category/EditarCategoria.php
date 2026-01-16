<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class EditarCategoria extends Component
{
    public $category_id;
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required',
        'slug' => 'required',
    ];

    public function mount(Category $category)
    {
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function editarCategory(){
        $datos = $this->validate();
        
        $category = Category::find($this->category_id);

        $category->name = $datos['name'];
        $category->slug = $datos['slug'];
        $category->save();

        session()->flash('mensaje', 'La categoria Se Modifico Correctamente');
        return redirect()->route('dashboard.admin');
    }

    public function render()
    {
        return view('livewire.category.editar-categoria');
    }
}
