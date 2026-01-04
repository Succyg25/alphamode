<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('My Subscription')]
class Subscription extends Component
{
    public function cancelSubscription()
    {
        $user = auth()->user();
        $user->current_plan_id = null;
        $user->save();

        session()->flash('message', 'Subscription cancelled successfully.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.subscription');
    }
}
