<?php

namespace App\Livewire;

use App\Models\Trainer;
use Livewire\Component;

class Trainers extends Component
{
    public function render()
    {
        return view('livewire.trainers', [
            'trainers' => Trainer::with('user')->get(),
        ]);
    }
}
