<?php

namespace App\Livewire;

use App\Models\Plan;
use Livewire\Component;

class Plans extends Component
{
    public function subscribe($planId)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        $user->current_plan_id = $planId;
        $user->save();

        session()->flash('message', 'You have successfully subscribed!');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.plans', [
            'plans' => Plan::all(),
        ]);
    }
}
