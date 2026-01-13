<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked = false;
    public $likes = 0;

    public function mount($post)
    {
        $this->post = $post;

        if (auth()->check()) {
            $this->isLiked = $this->post->checkLike(auth()->user());
        }

        $this->likes = $this->post->likes()->count();
    }

    public function like()
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        if ($this->post->checkLike(auth()->user())) {
            $this->post->likes()
                ->where('user_id', auth()->id())
                ->delete();

            $this->isLiked = false;
            $this->likes--;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->id(),
            ]);

            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}

