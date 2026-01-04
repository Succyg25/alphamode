<?php

namespace App\Livewire\Admin;

use App\Models\ClassSchedule;
use App\Models\WorkoutClass;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
#[Title('Manage Schedules')]
class ManageSchedules extends Component
{
    public $schedules, $workout_class_id, $start_time, $end_time, $schedule_id;
    public $isModalOpen = false;

    public function render()
    {
        $this->schedules = ClassSchedule::with('workoutClass')->orderBy('start_time')->get();
        return view('livewire.admin.manage-schedules', [
            'classes' => WorkoutClass::all(),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->workout_class_id = '';
        $this->start_time = '';
        $this->end_time = '';
        $this->schedule_id = null;
    }

    public function store()
    {
        $this->validate([
            'workout_class_id' => 'required|exists:workout_classes,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        ClassSchedule::updateOrCreate(['id' => $this->schedule_id], [
            'workout_class_id' => $this->workout_class_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ]);

        session()->flash('message', $this->schedule_id ? 'Schedule Updated Successfully.' : 'Schedule Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $schedule = ClassSchedule::findOrFail($id);
        $this->schedule_id = $id;
        $this->workout_class_id = $schedule->workout_class_id;
        $this->start_time = $schedule->start_time->format('Y-m-d\TH:i');
        $this->end_time = $schedule->end_time->format('Y-m-d\TH:i');

        $this->openModal();
    }

    public function delete($id)
    {
        ClassSchedule::find($id)->delete();
        session()->flash('message', 'Schedule Deleted Successfully.');
    }
}
