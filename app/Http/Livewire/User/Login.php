<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{


    public $email;
    public $forgot_password = false;
    public $registered = false;
    protected $listeners = ['close_pass' => 'close_forgot_password'];



    function show_forgot_password() {
        $this->forgot_password = true;
        
    }

    public function close_forgot_password() {
        $this->forgot_password = false;
    }

    public function mount($registered) {
        $this->registered = $registered;
    }
  
    public function closePopup() {
        $this->registered = false;
    }

    protected $rules = [
        'email' => 'required|email|min:8|max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveUser()
    {
        $this->validate();
        
        $user = User::create([
            'email' => $this->email,
        ]);
        $user->assignRole('user');

        return redirect()->route('register.success');
    }


    public function render()
    {
        return view('livewire.user.login');
    }
}
