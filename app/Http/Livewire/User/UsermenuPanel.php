<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

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
