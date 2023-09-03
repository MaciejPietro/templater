<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Http\Livewire\User\Login;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class PasswordResetForm extends Component
{

    public $email;
    public $email_send = false;


    protected $rules = [
        'email' => 'required|email|min:8|max:255'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function resetPassword()
    {
        $this->validate();
        
        $status = Password::sendResetLink(
            ['email' => $this->email]
        );
    
        if(Password::RESET_LINK_SENT) $this->email_send = true;
    }

      public function close_remind_password() {
        Login::$show_forgot_password = false; 
    }


    public function render()
    {
        return view($this->email_send ? 'livewire.user.password_reset_form_success' : 'livewire.user.password_reset_form');
    }
}
