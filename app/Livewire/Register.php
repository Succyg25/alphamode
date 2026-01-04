<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Register')]
class Register extends Component
{
    public $name;
    public $username;
    public $email;
    public $password;
    public $phone;
    public $birth_date;
    public $fitness_goals;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'username' => 'required|min:3|max:20|unique:users,username',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|min:6',
        'phone' => 'nullable|min:10|max:20',
        'birth_date' => 'nullable|date',
        'fitness_goals' => 'nullable|string|max:1000',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function registerUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'phone' => $this->phone,
            'birth_date' => $this->birth_date,
            'fitness_goals' => $this->fitness_goals,
        ]);

        session()->flash('feedback', 'Account Created Successfully! Please login.');

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
