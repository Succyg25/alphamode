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

        return redirect()->route('payment.checkout', ['plan' => $planId]);
    }

    public function render()
    {
        return view('livewire.plans', [
            'plans' => Plan::all(),
        ]);
    }
}
