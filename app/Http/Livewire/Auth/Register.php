<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Register extends Component
{
    use AuthorizesRequests;


    protected $listeners = ['refreshPage' => '$refresh'];

    public function mount()
    {
        $this->authorize('isAdmin');
    }

    // Delete Staff
    public function destroyStaff($userId)
    {
        $staff = User::find($userId);
        $staff->delete();
        $this->emit('alert', ['type' => 'error', 'message' => 'Deleted😀']);
    }


    public function render()
    {
        return view('livewire.auth.register', ['users' => User::latest()->get(['firstname', 'lastname', 'email', 'role', 'phone', 'id'])]);
    }
}
