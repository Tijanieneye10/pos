<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Register extends Component
{
    use AuthorizesRequests;

    public $firstname, $lastname, $email, $address,
        $phone, $role, $edit = false, $editData = [];


    public function mount()
    {
        $this->authorize('isAdmin');
    }

    // Let validate user
    public function updated($propertyName)
    {

        $this->validateOnly($propertyName, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'role' => 'required'
        ]);
    }

    // Add Staff
    public function addStaff()
    {
        User::Create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'address' => $this->address,
            'password' => $this->firstname,
            'phone' => $this->phone,
            'role' => $this->role,
        ]);

        $this->resetFilters();
        $this->emit('alert', ['type' => 'success', 'message' => 'Staff added successfully 😀']);
    }

    // Delete Staff
    public function destroyStaff($userId)
    {
        $staff = User::find($userId);
        $staff->delete();
        $this->emit('alert', ['type' => 'error', 'message' => 'Deleted😀']);
    }

    public function editStaff($userId)
    {
        $this->edit = true;
        $this->editData = User::find($userId);

        $this->firstname = $this->editData->firstname;
        $this->lastname = $this->editData->lastname;
        $this->phone = $this->editData->phone;
        $this->address = $this->editData->address;
        $this->role = $this->editData->role;
        $this->email = $this->editData->email;
    }

    public function updateStaff($userId)
    {
        User::where('id', $userId)
            ->Update([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'address' => $this->address,
                'password' => $this->firstname,
                'phone' => $this->phone,
                'role' => $this->role,
            ]);
        $this->emit('alert', ['type' => 'success', 'message' => 'Record updated 😀']);
    }

    //To refresh the page
    public function resetFilters()
    {
        $this->reset(['edit', 'editData', 'firstname', 'lastname', 'email', 'address', 'phone', 'role']);
    }

    public function render()
    {
        return view('livewire.auth.register', ['users' => User::latest()->get(['firstname', 'lastname', 'email', 'role', 'phone', 'id'])]);
    }
}
