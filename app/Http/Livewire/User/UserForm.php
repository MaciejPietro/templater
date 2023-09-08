<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

use Livewire\Component;

class UserForm extends Component
{
    public $method;

    public $user_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $position;
    public $role = 'user';

    public $password;
    public $change_password = false;

    protected $rules = [
        'first_name' => 'required|min:2|max:255',
        'last_name' => 'required|min:2|max:255',
        'email' => 'required|email|min:8|max:255',
        'phone' => 'nullable|min:9',
        'position' => 'nullable|min:3',
    ];

    protected $rulesForAdd = [
        'password' => 'required|min:8',
    ];

    protected $rulesForUpdate = [
        'password' => 'nullable|min:8',
    ];

    public function mount()
    {
        $this->password = $this->user_id ? null : Str::random(16);
        $this->change_password = $this->user_id ? false : true;

    }    

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function closePopup()
    {
        $this->emitUp('closePopup');
    }

    public function addUser()
    {
        $this->validate($this->rules + $this->rulesForAdd);

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'position' => $this->position,
            'password' => Hash::make($this->password)
        ]);
        $user->assignRole($this->role);

        $this->emit('userAdded');
        $this->emitUp('closePopup');
    }

    public function updateUser()
    {
        $user = User::find($this->user_id);


        $this->validate($this->rules + $this->rulesForUpdate);


        $args = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'position' => $this->position,
        ];


        if($this->change_password) {
            $args['password'] = Hash::make($this->password);
        }



        $user->update($args);
        $user->syncRoles([$this->role]);
        

        $this->emit('userUpdated');
        $this->emitUp('closePopup');
    }


    
    public function render()
    {
        return view('livewire.user.user-form');

    }
}
