<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Terms of Service')]
class Terms extends Component
{
    public function render()
    {
        return view('livewire.terms');
    }
}
