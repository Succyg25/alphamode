<?php

namespace App\Livewire\Admin;

use App\Models\Plan;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class ManagePlans extends Component
{
    public $plans, $name, $price, $duration_days, $description, $plan_id;
    public $isModalOpen = false;

    public function render()
    {
        $this->plans = Plan::all();
        return view('livewire.admin.manage-plans');
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
        $this->price = '';
        $this->duration_days = '';
        $this->description = '';
        $this->plan_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'duration_days' => 'required|integer',
            'description' => 'nullable',
        ]);

        Plan::updateOrCreate(['id' => $this->plan_id], [
            'name' => $this->name,
            'price' => $this->price,
            'duration_days' => $this->duration_days,
            'description' => $this->description,
        ]);

        session()->flash('message', $this->plan_id ? 'Plan Updated Successfully.' : 'Plan Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        $this->plan_id = $id;
        $this->name = $plan->name;
        $this->price = $plan->price;
        $this->duration_days = $plan->duration_days;
        $this->description = $plan->description;

        $this->openModal();
    }

    public function delete($id)
    {
        Plan::find($id)->delete();
        session()->flash('message', 'Plan Deleted Successfully.');
    }
}
