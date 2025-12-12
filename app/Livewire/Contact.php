<?php

namespace App\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.contact');
    }
    // Validation
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ];
    }
}