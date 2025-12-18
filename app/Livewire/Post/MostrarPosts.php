<?php

namespace App\Livewire\post;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Container\Attributes\Auth;

class MostrarPosts extends Component
{
    use WithPagination;

    protected $listeners = ['eliminarPost'];

    public function eliminarPost(Post $post){
        $post->delete();
    }

    public function render()
    {
        $query = Post::query();

        if (auth()->user()->role !== User::ROLE_ADMIN) {
            $query->where('user_id', auth()->id());
        }

        return view('livewire.post.mostrar-posts', [
            'posts' => $query->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
