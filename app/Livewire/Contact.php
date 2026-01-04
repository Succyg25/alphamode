<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Contact Us')]
class Contact extends Component
{
    public $name;
    public $email;
    public $message;

    public function rules()
    {
        return [
            'name' => 'required|min:3|string',
            'email' => 'required|email',
            'message' => 'required|min:10|string',
        ];
    }

    public function sendMessage()
    {
        $this->validate();

        // In a real app, you'd send an email here.
        // For now, we'll just show a success message.
        session()->flash('success', 'Thank you for reaching out! We will get back to you soon.');

        $this->reset(['name', 'email', 'message']);
    }

    public function render()
    {
        return view('livewire.contact');
    }
}