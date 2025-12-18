<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class EditarPost extends Component
{
    public $post_id;
    public $titulo;
    public $status;
    public $descripcion;
    public $category;
    public $imagen;
    public $imagen_nueva;
    
    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'descripcion' => 'required',
        'category' => 'required',
        'status' => 'required',
        'imagen_nueva' => 'nullable|image|max:2024'
    ];
    
    public function mount(Post $post){
        $this->post_id = $post->id;
        $this->titulo = $post->titulo;
        $this->status = $post->status;
        $this->descripcion = $post->descripcion;
        $this->category = $post->category;
        $this->imagen = $post->imagen;
    }

    public function editarPost(){
        $datos = $this->validate();

        // Nueva imagen
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('post', 'public');
            $datos['imagen'] = str_replace('post/', '', $imagen);
        }

        // Post a editar
        $post = Post::find($this->post_id);

        // Nuevos valores
        $post->titulo = $datos['titulo'];
        $post->status = $datos['status'];
        $post->descripcion = $datos['descripcion'];
        $post->category = $datos['category'];
        $post->imagen = $datos['imagen'] ?? $post->imagen;

        // Guardar post
        $post->save();

        // Redireccionar
        session()->flash('mensaje', 'El Post Se Modifico Correctamente');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.post.editar-post', [
            'categories' => Category::paginate(10),
        ]);
    }
}
