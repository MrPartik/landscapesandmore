<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Process extends Component
{
    public $typeOfInquiry = 'landscape';
    public $isExistingUser = 'no';
    public function render()
    {
        return view('livewire.process');
    }
}
