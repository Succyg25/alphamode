<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        // Fetch upcoming classes (future bookings)
        $upcomingClasses = Auth::user()->bookings()
            ->with('schedule.workoutClass.trainer.user')
            ->whereHas('schedule', function ($query) {
                $query->where('start_time', '>', now());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Fetch recent activity (recent bookings)
        $recentActivity = Auth::user()->bookings()
            ->with('schedule.workoutClass.trainer.user')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('livewire.dashboard', [
            'upcomingClasses' => $upcomingClasses,
            'recentActivity' => $recentActivity,
        ]);
    }
}
