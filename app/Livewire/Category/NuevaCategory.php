<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Auth\Events\Registered;

class NuevaCategory extends Component
{

    public $name;
    public $slug;

    protected function rules(){
        return[
            'name' => 'required',
            'slug' => 'required',
        ];
    }

    public function createCategory(){
        $datos = $this->validate();

        $category = Category::create([
            'name' =>$datos['name'],
            'slug' =>$datos['slug'],
        ]);

        event(new Registered($category));

        //Crear un mensaje
        session()->flash('mensaje', 'Categoria Creada Correctamente');

        //Redireccionar al usuario
        return redirect()->route('category.index');
    }

    public function render()
    {
        return view('livewire.category.nueva-category');
    }

    public $open = false;

    public function openModal()
    {
        $this->open = true;
    }

    public function closeModal()
    {
        $this->open = false;
    }
}
