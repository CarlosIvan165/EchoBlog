<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create(){
        return view('employee.create');
    }

    public function edit(User $user){
        return view('employee.edit', [
            'user' => $user
        ]);
    }
}
