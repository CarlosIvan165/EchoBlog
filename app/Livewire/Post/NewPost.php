<?php

namespace App\Livewire\Post;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class NewPost extends Component
{
    public $titulo;
    public $descripcion;
    public $category;
    public $imagen;
    public $users;
    public $status;
    public $categorias;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'descripcion' => 'required',
        'category' => 'required',
        'imagen' => 'required|image|mimes:jpg,jpeg,png,webp,avif|max:4096',
        'status' => 'required|in:0,1'
    ];

    public function newPost(){
        $datos = $this->validate();
        //Almacenar la imagen
        $imagen = $this->imagen->store('post', 'public');
        $datos['imagen'] = str_replace('post/', '', $imagen);

        //Crear la vacante
        Post::create([
            'titulo' => $datos['titulo'],
            'descripcion' => $datos['descripcion'],
            'category' => $datos['category'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
            'status' => $datos['status'],
        ]);

        //Crear un mensaje
        session()->flash('mensaje', 'El Post se publico correctamente');

        //Redireccionar al usuario
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.post.new-post', [
            'categories' => Category::paginate(10),
        ]);
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
