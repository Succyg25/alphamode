<?php

namespace App\Livewire\Admin;

use App\Models\Trainer;
use App\Models\WorkoutClass;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class ManageClasses extends Component
{
    public $classes, $name, $description, $capacity, $trainer_id, $class_id;
    public $isModalOpen = false;

    public function render()
    {
        $this->classes = WorkoutClass::with('trainer.user')->get();
        return view('livewire.admin.manage-classes', [
            'trainers' => Trainer::with('user')->get(),
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
        $this->name = '';
        $this->description = '';
        $this->capacity = 20;
        $this->trainer_id = '';
        $this->class_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'nullable',
            'capacity' => 'required|integer|min:1',
            'trainer_id' => 'required|exists:trainers,id',
        ]);

        WorkoutClass::updateOrCreate(['id' => $this->class_id], [
            'name' => $this->name,
            'description' => $this->description,
            'capacity' => $this->capacity,
            'trainer_id' => $this->trainer_id,
        ]);

        session()->flash('message', $this->class_id ? 'Class Updated Successfully.' : 'Class Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $class = WorkoutClass::findOrFail($id);
        $this->class_id = $id;
        $this->name = $class->name;
        $this->description = $class->description;
        $this->capacity = $class->capacity;
        $this->trainer_id = $class->trainer_id;

        $this->openModal();
    }

    public function delete($id)
    {
        WorkoutClass::find($id)->delete();
        session()->flash('message', 'Class Deleted Successfully.');
    }
}
