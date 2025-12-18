<?php

namespace App\Livewire\Post;

use App\Models\Comentario;
use Livewire\Component;

class MostrarPost extends Component
{
    public $post;
    public $postId;

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function render()
    {
        return view('livewire.post.mostrar-post', [
            'comentarios' => Comentario::where('post_id', $this->postId)
            ->orderBy('created_at', 'asc')
            ->get(),
        ]);
        
    }
}
