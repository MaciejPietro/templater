<?php

namespace App\Http\Livewire\Dashboard\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class ProfileEdit extends Component
{
    use WithFileUploads;

    public $user;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $position;
    public $edit_mode = false;

    protected $rules = [
        'first_name' => 'required|min:2|max:255',
        'last_name' => 'required|min:2|max:255',
        'email' => 'required|min:2|max:255',
        'phone' => 'min:9|max:15',
        'position' => 'min:3|max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function mount()
    {
        $this->user = auth()->user();

        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->position = $this->user->position;
    }

    public function editUser()
    {
        $this->validate();
        
        $this->user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'position' => $this->position,
        ]);

        session()->flash('global_message', 'Data edit succesfully');

    }

        public function stopEditing() {
        $this->edit_mode = false;
    }

    public function render()
    {
        return view('livewire.dashboard.profile.edit');
    }
}
