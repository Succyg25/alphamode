<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSubmission;

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

        // Send email to admin
        Mail::to(config('mail.from.address'))->send(new ContactSubmission([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]));

        session()->flash('success', 'Thank you for reaching out! We will get back to you soon.');

        $this->reset(['name', 'email', 'message']);
    }

    public function render()
    {
        return view('livewire.contact');
    }
}