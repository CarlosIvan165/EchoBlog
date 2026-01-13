<?php

namespace App\Livewire\Index;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;

class PostDestacado extends Component
{
    public $categoryId = null;

    public function render()
    {
        $query = Post::where('status', 1)
            ->withCount('likes');

        if ($this->categoryId) {
            $query->where('category', $this->categoryId);
        }

        $post = $query
            ->orderBy('likes_count', 'desc')
            ->orderBy('created_at', 'desc')
            ->first();


        return view('livewire.index.post-destacado', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }
}
