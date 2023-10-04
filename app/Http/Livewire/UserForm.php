<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserForm extends Component
{
    public $user;
    public $password;
    protected $listeners = [
        'edit'
    ];

    protected function rules()
    {
        return [
            'user.is_admin' => 'required',
            'user.is_revisor' => 'required',
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'required'
        ];
    }

    protected $messages = [
        'user.is_revisor.required' => 'This field accepts only two values: blogger or admin',
    ];

    public function store()
    {
        if ($this->user->is_revisor == null) {
            $this->user->is_revisor = 1;
        }

        if ($this->user->is_admin == null) {
            $this->user->is_admin = 1;
        }

        $this->validate();
        $this->user->password = \Illuminate\Support\Facades\Hash::make($this->password);
        $this->user->save();
        session()->flash('success', 'User successfully saved');
        $this->newUser();
        $this->emitTo('users-list', 'loadUsers');
    }

    public function mount()
    {
        $this->newUser();
    }

    public function newUser()
    {
        $this->user = new \App\Models\User;
        $this->password = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit($user_id)
    {
        $this->user = \App\Models\User::find($user_id);
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
