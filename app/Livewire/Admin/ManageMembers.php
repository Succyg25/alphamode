<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
#[Title('Manage Members')]
class ManageMembers extends Component
{
    public $members, $name, $email, $password, $member_id;
    public $isModalOpen = false;

    public function render()
    {
        $this->members = User::where('role', 'member')->get();
        return view('livewire.admin.manage-members');
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
        $this->password = '';
        $this->member_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->member_id,
            'password' => $this->member_id ? 'nullable|min:6' : 'required|min:6',
        ]);

        if ($this->member_id) {
            $user = User::find($this->member_id);
            $data = [
                'name' => $this->name,
                'email' => $this->email,
            ];
            if ($this->password) {
                $data['password'] = Hash::make($this->password);
            }
            $user->update($data);
            session()->flash('message', 'Member Updated Successfully.');
        } else {
            User::create([
                'name' => $this->name,
                'username' => explode('@', $this->email)[0] . rand(100, 999),
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => 'member',
            ]);
            session()->flash('message', 'Member Created Successfully.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $member = User::findOrFail($id);
        $this->member_id = $id;
        $this->name = $member->name;
        $this->email = $member->email;
        $this->password = '';

        $this->openModal();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'Member Deleted Successfully.');
    }
}
