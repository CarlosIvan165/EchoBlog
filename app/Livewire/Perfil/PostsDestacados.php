<?php

namespace App\Livewire\Perfil;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class PostsDestacados extends Component
{
    public User $user;
    public string $layout = 'vertical';

    public function mount(User $user, $layout = 'vertical')
    {
        $this->user = $user;
        $this->layout = $layout;
    }
    
    public function render()
    {
        return view('livewire.perfil.posts-destacados', [
            'posts' => Post::where('user_id', $this->user->id)
                ->withCount('likes') // 👈 crea likes_count
                ->having('likes_count', '>=', 1)
                ->orderByDesc('likes_count')
                ->orderBy('created_at', 'desc')
                ->latest()
                ->take(3)
                ->get(),
        ]);
    }
}
