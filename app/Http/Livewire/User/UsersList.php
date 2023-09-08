<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class UsersList extends Component
{
    public $users = [];
    public $user_to_delete = false;
    public $user_to_edit = false;

    protected $listeners = ['userDeleted' => 'getUsers', 'userAdded' => 'getUsers', 'closePopup' => 'closePopups'];

    public function mount()
    {
        $this->getUsers();
    }

    public function openDeleteUserPopup($user)
    {
        $this->user_to_delete = $user;
    }

    public function openEditUserPopup($user)
    {
        $this->user_to_edit = $user;
    }

    public function closePopups()
    {
        $this->user_to_edit = false;
    }



    public function getUsers()
    {
        $this->users = User::select('id', 'first_name', 'last_name', 'email', 'created_at', 'phone', 'position')->get();
    }

    public function deleteUser()
    {
        if($this->user_to_delete) {
            User::find($this->user_to_delete['id'])->delete();
            $this->emit('userDeleted');
            $this->user_to_delete = false;
        }
    }

    public function render()
    {
        return view('livewire.user.users-list');
    }
}
