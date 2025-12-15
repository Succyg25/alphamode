<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function loginUser()
    {
        $this->validate();

        if (
            Auth::attempt([
                'email' => $this->email,
                'password' => $this->password
            ])
        ) {
            session()->flash('feedback', 'Login Successful!');

            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('dashboard');
        }

        session()->flash('feedback', 'Invalid Login Details.');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
