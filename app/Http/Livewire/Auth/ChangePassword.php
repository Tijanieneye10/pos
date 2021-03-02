<?php

namespace App\Http\Livewire\Auth;


use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class ChangePassword extends Component
{
    public $old, $password, $password_confirmation;

    // Let validate user
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'old' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
    }

    public function resetPassword()
    {
      
        if (!Hash::check($this->old, auth()->user()->password)) {
            session()->flash('message', 'The Provided password does\'nt match our record');
        } else {
            auth()->user()->update(['password' => $this->password]);
            session()->flash('message', 'Password change successfully!');
            $this->resetFilters();
        }
    }

    // Reset fields
    public function resetFilters()
    {
        $this->reset(['password', 'old', 'password_confirmation']);
    }

    public function render()
    {
        return view('livewire.auth.change-password');
    }
}
