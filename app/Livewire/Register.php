<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $username;
    public $email_address;
    public $password;

    protected $rules = [
        'username' => 'required|min:3|max:20|unique:users,username',
        'email_address' => 'required|email|max:255|unique:users,email_address',
        'password' => 'required|min:6',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function registerUser()
    {
        $this->validate();

        User::create([
            'name' => $this->username,
            'username' => $this->username,
            'email_address' => $this->email_address,
            'password' => bcrypt($this->password),
        ]);

        $this->reset([
            'username',
            'email_address',
            'password',
        ]);

        session()->flash('feedback', 'Account Created Successfully!');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
