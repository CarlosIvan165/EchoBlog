<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function show(User $user){
        /* Gate::authorize('create', Vacante::class); */
        return view('perfil.index', [
            'user' => $user,
        ]);
    }
}
