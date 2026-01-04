<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

#[Title('My Profile')]
class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $username;
    public $photo;
    public $currentPhoto;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->currentPhoto = $user->profile_photo_url;
    }

    public function updateProfile()
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:1024'], // 1MB Max
        ]);

        if ($this->photo) {
            // Delete old photo if exists
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $path = $this->photo->store('profile-photos', 'public');
            $user->profile_photo = $path;
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->username = $validated['username'];
        $user->save();

        $this->currentPhoto = $user->profile_photo_url;
        $this->photo = null;

        session()->flash('success', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
