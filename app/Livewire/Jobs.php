<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Careers')]
class Jobs extends Component
{
    public function render()
    {
        return view('livewire.jobs');
    }
}
