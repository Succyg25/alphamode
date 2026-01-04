<?php

namespace App\Livewire;

use App\Models\Plan;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Membership Plans')]
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
