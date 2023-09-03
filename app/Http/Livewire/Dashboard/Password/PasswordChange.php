<?php

namespace App\Http\Livewire\Dashboard\Password;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class PasswordChange extends Component
{

    public $old_password;
    public $password;
    public $password_confirmation;
    public $edit_mode = false;


    protected $rules = [
        'old_password' => 'required|min:8',
        'password' => 'required|min:8|confirmed',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function changePassword()
    {
        $this->validate();

        //check old password
        if (!Hash::check($this->old_password, auth()->user()->password)) {
            session()->flash('global_message', 'Old password is incorrect.');
        } else {
            $user = auth()->user();
            $user->password = Hash::make($this->password);
            $user->save();
            
            session()->flash('global_message', 'Password changed.');
        }

    }


    public function stopEditing() {
        $this->edit_mode = false;
    }

    public function render()
    {
        return view('livewire.dashboard.password.change');
    }
}
