<?php

namespace App\Http\Livewire\Dashboard\Profile;

use App\Models\User;
use Livewire\Component;
use App\Mail\Contact as MailContact;
use App\Services\ApplicationService;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{

    public $content;
    public $service;
    public $status;
    public $show_popup = false;
    public $applications = [];

    protected $rules = [
        'service' => 'nullable',
        'content' => 'required|min:3'
    ];

    public function mount()
    {
        $this->status = false;
        $this->applications = (new ApplicationService())->getAllByAuthUser();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function stopEditing() {
        $this->show_popup = false;
    }

    public function sendMessage()
    {
        $this->validate();

        if(Mail::to(config('mail.from.address'))->send(new MailContact(auth()->user(), $this->content))) {
            $this->status = true;
        } else {
            session()->flash('global_message', 'Data edit succesfully');
            $this->reset();
            $this->show_popup = true;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.profile.contact');
    }

}
