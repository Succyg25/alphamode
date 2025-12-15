<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Trainer;
use App\Models\ClassSchedule;
use App\Models\Booking as BookingModel;
use Illuminate\Support\Facades\Auth;

class Booking extends Component
{
    public $trainer;
    public $schedules;
    public $step = 1;
    public $selectedSchedule;

    public function mount(Trainer $trainer)
    {
        $this->trainer = $trainer->load('user');
        // Fetch future schedules for this trainer
        $this->schedules = ClassSchedule::whereHas('workoutClass', function ($query) use ($trainer) {
            $query->where('trainer_id', $trainer->id);
        })
            ->where('start_time', '>', now())
            ->with('workoutClass') // Eager load workoutClass
            ->orderBy('start_time')
            ->get();
    }

    public function selectSchedule($scheduleId)
    {
        $this->selectedSchedule = $this->schedules->find($scheduleId);
        $this->step = 2;
    }

    public function confirmBooking()
    {
        if (!$this->selectedSchedule) {
            return;
        }

        // Basic booking logic
        BookingModel::create([
            'user_id' => Auth::id(),
            'class_schedule_id' => $this->selectedSchedule->id,
        ]);

        session()->flash('feedback', 'Class booked successfully!');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.booking');
    }
}
