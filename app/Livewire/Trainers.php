<?php

namespace App\Livewire;

use App\Models\Trainer;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Our Trainers')]
class Trainers extends Component
{
    public function render()
    {
        return view('livewire.trainers', [
            'trainers' => Trainer::with([
                'user',
                'workoutClasses.schedules' => function ($query) {
                    $query->where('start_time', '>', now())->orderBy('start_time');
                }
            ])->get(),
        ]);
    }
}
