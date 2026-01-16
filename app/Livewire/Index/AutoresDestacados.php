<?php

namespace App\Livewire\Index;

use App\Models\User;
use Livewire\Component;

class AutoresDestacados extends Component
{

    public string $layout = 'vertical';

    public function mount($layout = 'vertical'){
        $this->layout = $layout;    
    }

    public function render()
    {
        return view('livewire.index.autores-destacados', [
            'admins' => User::where('role', User::ROLE_AUTORES)
                ->latest()
                ->take(3)
                ->get(),
        ]);

    }
}
