<?php

namespace App\Livewire\Index;

use App\Models\Post;
use Livewire\Component;

class PostDestacados extends Component
{
    public function render()
    {
        $query = Post::where('status', 1)
            ->withCount('likes');

        $post = $query
            ->having('likes_count', '>=', 1)
            ->orderByDesc('likes_count')
            ->orderBy('created_at', 'desc')
            ->latest()
            ->take(3)
            ->get();

        return view('livewire.index.post-destacados', [
            'posts' => $post,
        ]);
    }
}
