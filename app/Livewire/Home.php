<?php

namespace App\Livewire;

use App\Models\Plan;
use App\Models\Trainer;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'featuredTrainers' => Trainer::with('user')->take(3)->get(),
            'plans' => Plan::take(3)->get(),
        ]);
    }
}
