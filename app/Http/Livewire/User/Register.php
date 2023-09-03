<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{

    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'first_name' => 'required|min:2|max:255',
        'last_name' => 'required|min:2|max:255',
        'email' => 'required|email|min:8|max:255|unique:users',
        'password' => 'required|min:8|confirmed'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveUser()
    {
        $this->validate();
        
        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        $user->assignRole('user');

        return redirect()->route('register.success');
    }

    public function render()
    {
        return view('livewire.user.register');
    }
}
