<?php

namespace App\Livewire\Perfil;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{

    use WithPagination;

    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.perfil.posts', [
            'posts' => Post::where('user_id', $this->user->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    }
}
