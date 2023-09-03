<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class PasswordReset extends Component
{

    public $email;
    public $token;
    public $password;
    public $password_confirmation;
    public $success_popup = false;


    protected $rules = [
        'token' => 'required',
        'email' => 'required|email|min:8|max:255',
        'password' => 'required|min:8|confirmed',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function resetPassword()
    {
        $this->validate();

        $status = Password::reset(
            ['email' => $this->email, 'password' => $this->password,
                'password_confirmation' => $this->password_confirmation, 'token' => $this->token],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        // return redirect()->route('home');


        $this->success_popup = true;

        // return false;

    }

    public function redirect_to_login() {
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.user.password_reset');
    }
}
