<?php

namespace App\Livewire;

use App\Models\Plan;
use Livewire\Component;

class Plans extends Component
{
    public function render()
    {
        return view('livewire.plans', [
            'plans' => Plan::all(),
        ]);
    }
}
