<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsersList extends Component
{
    public $users;

    protected $listeners = [
        'loadUsers'
    ];
    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = \App\Models\User::all();
    }

    public function editUser($user_id)
    {
        $this->emitTo('user-form', 'edit', $user_id);
    }

    public function deleteUser($user_id)
    {
        $user = \App\Models\User::find($user_id);
        $user->delete();
        session()->flash('success', 'User successfully delete');
        $this->loadUsers();
    }
    public function render()
    {
        return view('livewire.users-list');
    }
}
