<?php

namespace App\Livewire\Admin;

use App\Models\Trainer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
#[Title('Manage Trainers')]
class ManageTrainers extends Component
{
    public $trainers, $name, $email, $bio, $specialties, $trainer_id, $password;
    public $isModalOpen = false;

    public function render()
    {
        $this->trainers = Trainer::with('user')->get();
        return view('livewire.admin.manage-trainers');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->bio = '';
        $this->specialties = '';
        $this->password = '';
        $this->trainer_id = null;
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . ($this->trainer_id ? Trainer::find($this->trainer_id)->user_id : ''),
            'bio' => 'nullable',
            'specialties' => 'nullable',
        ];

        if (!$this->trainer_id) {
            $rules['password'] = 'required|min:6';
        } else {
            $rules['password'] = 'nullable|min:6';
        }

        $this->validate($rules);

        if ($this->trainer_id) {
            $trainer = Trainer::find($this->trainer_id);
            $userData = [
                'name' => $this->name,
                'email' => $this->email,
            ];
            if ($this->password) {
                $userData['password'] = Hash::make($this->password);
            }
            $trainer->user->update($userData);
            $trainer->update([
                'bio' => $this->bio,
                'specialties' => $this->specialties,
            ]);
        } else {
            $user = User::create([
                'name' => $this->name,
                'username' => explode('@', $this->email)[0] . rand(100, 999),
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => 'trainer',
            ]);

            Trainer::create([
                'user_id' => $user->id,
                'bio' => $this->bio,
                'specialties' => $this->specialties,
            ]);
        }

        session()->flash('message', $this->trainer_id ? 'Trainer Updated Successfully.' : 'Trainer Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $trainer = Trainer::with('user')->findOrFail($id);
        $this->trainer_id = $id;
        $this->name = $trainer->user->name;
        $this->email = $trainer->user->email;
        $this->bio = $trainer->bio;
        $this->specialties = $trainer->specialties;

        $this->openModal();
    }

    public function delete($id)
    {
        $trainer = Trainer::find($id);
        if ($trainer && $trainer->user) {
            $trainer->user->delete(); // This cascades to trainer due to DB constraints usually, or we manually delete if not.
            // My migration has onDelete('cascade') on trainer side, but if I delete User, Trainer goes.
            // If I delete Trainer, User remains? No, user is the parent. We should delete the User.
        } elseif ($trainer) {
            $trainer->delete();
        }

        session()->flash('message', 'Trainer Deleted Successfully.');
    }
}
