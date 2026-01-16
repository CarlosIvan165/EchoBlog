<?php

namespace App\Livewire\Autor;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DashboardContador extends Component
{
    public function render()
    {
        return view('livewire.autor.dashboard-contador',[
            'post' => Post::where('user_id', auth()->id())
                ->count(),
            'public' => Post::where('user_id', auth()->id())
                ->where('status', 1)
                ->count(),
            'draft' => Post::where('user_id', auth()->id())
                ->where('status', 0)
                ->count(),
        ]);
    }
}
