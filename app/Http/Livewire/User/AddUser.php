<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

use Livewire\Component;

class AddUser extends Component
{
    public $is_open = false;
    protected $listeners = ['closePopup' => 'closePopup'];


    public function closePopup()
    {
        $this->is_open = false;
    }

    
    public function render()
    {
        return view('livewire.user.add-user');
    }
}
