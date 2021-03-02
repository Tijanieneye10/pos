<?php

namespace App\Http\Livewire\Staff;

use App\Models\User;
use Livewire\Component;

class ViewUsers extends Component
{

    public function render()
    {
        return view('livewire.staff.view-users', ['users' => User::all()]);
    }
}
