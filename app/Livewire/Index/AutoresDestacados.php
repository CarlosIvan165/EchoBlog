<?php

namespace App\Livewire\Index;

use App\Models\User;
use Livewire\Component;

class AutoresDestacados extends Component
{
    public function render()
    {
        return view('livewire.index.autores-destacados', [
            'admins' => User::where('role', User::ROLE_ADMIN)
                ->whereNotNull('bio')
                ->get(),
        ]);

    }
}
