<?php

namespace App\Livewire\Trainer;

use App\Models\Trainer;
use App\Models\WorkoutClass;
use App\Models\ClassSchedule;
use App\Models\Booking;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.trainer')]
class Dashboard extends Component
{
    public $trainer;
    public $totalClasses;
    public $upcomingSessions;
    public $totalClients;
    public $myClasses;
    public $upcomingSchedules;

    public function mount()
    {
        // Get trainer record for logged-in user
        $this->trainer = Trainer::where('user_id', Auth::id())->with('user')->first();

        if (!$this->trainer) {
            abort(403, 'Trainer profile not found');
        }

        // Load statistics
        $this->totalClasses = WorkoutClass::where('trainer_id', $this->trainer->id)->count();

        $this->upcomingSessions = ClassSchedule::whereHas('workoutClass', function ($query) {
            $query->where('trainer_id', $this->trainer->id);
        })
            ->where('start_time', '>', now())
            ->count();

        $this->totalClients = Booking::whereHas('classSchedule.workoutClass', function ($query) {
            $query->where('trainer_id', $this->trainer->id);
        })
            ->distinct('user_id')
            ->count('user_id');

        // Load my classes
        $this->myClasses = WorkoutClass::where('trainer_id', $this->trainer->id)
            ->withCount('schedules')
            ->get();

        // Load upcoming schedules with booking counts
        $this->upcomingSchedules = ClassSchedule::whereHas('workoutClass', function ($query) {
            $query->where('trainer_id', $this->trainer->id);
        })
            ->where('start_time', '>', now())
            ->with(['workoutClass', 'bookings.user'])
            ->withCount('bookings')
            ->orderBy('start_time')
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.trainer.dashboard');
    }
}
