<?php

namespace App\Http\Livewire\Form;

use App\Models\User;
use Livewire\Component;

class RegisterForm extends Component
{
    public $firstname, $lastname, $email, $address,
        $phone, $role, $edit = false, $editData = [];

    protected $listeners = ['editStaff' => 'editStaff'];

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
        $this->emit('refreshPage');
        $this->dispatchBrowserEvent('alert',  ['type' => 'success', 'message' => 'Staff added sucessfully 😊']);
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
        $this->emit('refreshPage');
        $this->dispatchBrowserEvent('alert',  ['type' => 'success', 'message' => 'Record updated 😊']);
    }

    //To refresh the page
    public function resetFilters()
    {
        $this->reset(['edit', 'editData', 'firstname', 'lastname', 'email', 'address', 'phone', 'role']);
    }
    public function render()
    {
        return view('livewire.form.register-form');
    }
}
