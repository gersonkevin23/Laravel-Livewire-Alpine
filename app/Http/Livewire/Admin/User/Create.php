<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    protected $queryString = ['user_id'];
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $role;
    public $status;
    public $password_confirmation;
    public $editing = false;
    public $edit_user;

    protected $rules = [
        'name' => 'required|string',
        'role' => 'required',
        'status' => 'required',
    ];

    public function mount()
    {
        if ($this->user_id) {
            $this->edit_user = User::findOrFail($this->user_id);
            $this->name = $this->edit_user->name;
            $this->email = $this->edit_user->email;
            $this->role = $this->edit_user->roles->first()->name;
            $this->status = $this->edit_user->status;
            $this->editing = true;
        }
    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }

    public function addUser()
    {
        if ($this->editing) {
            $this->rules['email'] = 'required|email|unique:users,email,' . $this->edit_user->id;
            $this->rules['password'] = 'sometimes|confirmed';
            $this->validate();
            $user = $this->edit_user;
        } else {
            $this->rules['email'] = 'required|email|unique:users,email';
            $this->rules['password'] = 'required|confirmed';
            $this->validate();
            $user = new User();
        }
        $user->name = $this->name;
        $user->email = $this->email;
        $user->syncRoles($this->role);
        $user->status = ($this->role == 'Member')?$this->status:'Pro';
        $user->password = ($this->password)?bcrypt($this->password):$this->edit_user->password;
        $user->save();
        $this->redirect(route('admin-dashboard'));
    }
}
