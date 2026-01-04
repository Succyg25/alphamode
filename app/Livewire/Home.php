<?php

namespace App\Livewire;

use App\Models\Plan;
use App\Models\Trainer;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
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
