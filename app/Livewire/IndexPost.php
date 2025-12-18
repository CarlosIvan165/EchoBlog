<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPost extends Component
{

    use WithPagination;

    public $categoryId = null;

    public function render()
    {
        return view('livewire.index-post',[
            'posts' => Post::where('status', 1)
                ->when($this->categoryId, fn ($q) =>
                    $q->where('category', $this->categoryId)
                )
                ->orderBy('created_at', 'desc')
                ->paginate(10),
            'category' => Category::all(),
        ]);
    }
}
