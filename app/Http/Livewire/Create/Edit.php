<?php

namespace App\Http\Livewire\Create;

use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Quill;
use Livewire\Component;

class Edit extends Component
{
    public $text = '';


    public $name = '';
    public $position = '';

    public $phone = '';
    public $email = '';
    public $address = '';
    public $website = '';

    public $footer = 'The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.';

    public $listeners = [
        Quill::EVENT_VALUE_UPDATED
    ];


    public function mount()
    {
        // $this->status = false;
        // $this->applications = (new ApplicationService())->getAllByAuthUser();
        $user = Auth::user();
        if(isset($user->first_name) || isset($user->last_name) ) {
            $this->name = $user->first_name . ' ' . $user->last_name;
        }

        if(isset($user->email)  ) {
            $this->email = $user->email;
        }

        if(isset($user->phone)  ) {
            $this->phone = $user->phone;
        }

        if(isset($user->position)  ) {
            $this->position = $user->position;
        }
    }



    public function quill_value_updated($value, $field){
        $this->{$field} = $value;
    }


    public function render()
    {
        return view('livewire.create.edit');
    }
}
