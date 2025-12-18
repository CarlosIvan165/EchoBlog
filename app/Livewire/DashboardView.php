<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class DashboardView extends Component
{
    public function render()
    {
        return view('livewire.dashboard-view', [
            /* posts */
            'totalPosts' => Post::count(),
            'totalPublic' => Post::where('status', 1)->count(),
            'totalDraft' => Post::where('status', 0)->count(),
            'ultimosPosts' => Post::latest()->take(3)->get(),

            'postwriters' => Post::where('status', 1)
                ->where('user_id', auth()->id())
                ->latest()
                ->take(3)
                ->get(),


            /* users */
            'total' => User::count(),
            'totalUsers' => User::where('role', User::ROLE_USER)->count(),
            'totalWriter' => User::where('role', User::ROLE_AUTORES)->count(),
            'totalAdmin' => User::where('role', User::ROLE_ADMIN)->count(),
            'ultimosUsers' => User::latest()->take(4)->get(),
        ]);
    }
}
