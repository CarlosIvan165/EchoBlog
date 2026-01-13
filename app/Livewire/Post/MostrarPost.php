<?php

namespace App\Livewire\Post;

use App\Models\User;
use Livewire\Component;
use App\Models\Comentario;

class MostrarPost extends Component
{
    public $post;
    public $postId;
    public $user;

    public function mount($postId, User $user)
    {
        $this->postId = $postId;
        $this->user = $user;
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
