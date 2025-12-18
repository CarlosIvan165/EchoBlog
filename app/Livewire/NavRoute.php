<?php

namespace App\Livewire;

use Livewire\Component;

class NavRoute extends Component
{
    public function getRoute()
    {
        $user = auth()->user();

        // 👇 Si NO hay usuario autenticado
        if (!$user) {
            return 'index';
        }

        // 👇 Si hay usuario
        return match (true) {
            $user->can('admin') => 'dashboard',
            default => 'index',
        };
    }

    public function render()
    {
        return view('livewire.nav-route',[
            'route' => $this->getRoute(),
        ]);
    }
}
