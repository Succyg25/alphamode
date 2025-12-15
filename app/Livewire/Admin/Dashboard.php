<?php

namespace App\Livewire\Admin;

use App\Models\Plan;
use App\Models\Trainer;
use App\Models\User;
use App\Models\WorkoutClass;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalMembers' => User::where('role', 'member')->count(),
            'totalTrainers' => Trainer::count(),
            'totalPlans' => Plan::count(),
            'totalClasses' => WorkoutClass::count(),
        ]);
    }

    public function activePlans()
    {
        return Plan::where('status', 'active')->count();
    }
}
