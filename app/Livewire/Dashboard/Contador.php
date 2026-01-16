<?php

namespace App\Livewire\Dashboard;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Contador extends Component
{
    public function render()
    {
        return view('livewire.dashboard.contador', [
            'post' => Post::count(),
            'public' => Post::where('status', 1)->count(),
            'draft' => Post::where('status', 0)->count(),
            'user' => User::where('role', User::ROLE_USER)->count(),
            'writer' => User::where('role', User::ROLE_AUTORES)->count(),
            'admin' => User::where('role', User::ROLE_ADMIN)->count(),
            'category' => Category::count()
        ]);
    }
}
