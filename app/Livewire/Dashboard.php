<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        // For now, simple mock of memberships or bookings
        // In real app, we would query Auth::user()->bookings() etc.
        $upcomingClasses = Auth::user()->bookings()->with('schedule.workoutClass')->get();

        return view('livewire.dashboard', [
            'upcomingClasses' => $upcomingClasses,
        ]);
    }
}
