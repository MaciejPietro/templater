<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Http\Livewire\User\Login;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class UsermenuPanel extends Component
{

  public $logout_popup = false;

  public function stopEditing() {
    $this->logout_popup = false;
  }

  public function openPopup() {
    $this->logout_popup = true;

  }
}
