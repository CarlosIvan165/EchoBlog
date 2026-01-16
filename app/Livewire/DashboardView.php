<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class DashboardView extends Component
{
    public function render()
    {
        return view('livewire.dashboard-view');
    }
}
