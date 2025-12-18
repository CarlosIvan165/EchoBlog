<?php

namespace App\Livewire\Employee;

use App\Models\User;
use Livewire\Component;

class EditarEmployee extends Component
{
    public $user_id;
    public $name;
    public $email;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
    ];

    public function mount(User $user){
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function editarUser(){
        $datos = $this->validate();
        
        $user = User::find($this->user_id);

        $user->name = $datos['name'];
        $user->email = $datos['email'];
        $user->save();

        session()->flash('mensaje', 'El Autor Se Modifico Correctamente');
        return redirect()->route('employees.index');
    }

    public function render()
    {
        return view('livewire.employee.editar-employee');
    }
}
