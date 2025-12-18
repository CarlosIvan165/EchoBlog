<?php

namespace App\Livewire\employee;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class NuevoEmpleado extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }


    public function createAutor(){

        $datos = $this->validate();

        $user = User::create([
            'name'=>$datos['name'],
            'email'=>$datos['email'],
            'password'=> Hash::make($datos['password']),
            'role' => User::ROLE_AUTORES,
        ]);

        event(new Registered($user));

        //Crear un mensaje
        session()->flash('mensaje', 'Autor Creado Correctamente');

        //Redireccionar al usuario
        return redirect()->route('employees.index');
    }

    public function render()
    {
        return view('livewire.employee.nuevo-empleado');
    }

    public $open = false;

    public function openModal()
    {
        $this->open = true;
    }

    public function closeModal()
    {
        $this->open = false;
    }
}
