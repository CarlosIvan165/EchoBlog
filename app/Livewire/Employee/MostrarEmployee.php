<?php

namespace App\Livewire\Employee;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarEmployee extends Component
{
    use WithPagination;

    protected $listeners = ['eliminarUser'];

    public function eliminarUser(User $user){
        $user->delete();
    }
    
    public function render()
    {
        return view('livewire.employee.mostrar-employee', [
            'users' => User::whereIn('role', [
                    User::ROLE_AUTORES,
                    User::ROLE_ADMIN
                ])
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    }
}
