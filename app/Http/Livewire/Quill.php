<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Quill extends Component
{
    const EVENT_VALUE_UPDATED = 'quill_value_updated';

    public $value;
    public $field;
    public $initText;


    
    public $quillId;

    public function mount($value, $field){
        $this->initText = $value;
        $this->field = $field;
        $this->quillId = 'quill-'. uniqid();
    }

    public function updatedValue($value) {
        $this->emit(self::EVENT_VALUE_UPDATED, $this->value, $this->field);
    }

    public function render()
    {
        return view('livewire.quill');
    }
}