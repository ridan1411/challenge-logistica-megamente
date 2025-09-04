<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $userId;
    public $name = '';
    public $email = '';
    public $password = '';
    public $roles = [];
    public $selectedRole = null;

    public function mount(User $user)
    {
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->roles = Role::pluck('name', 'id')->toArray();

        // Seleccionamos el rol actual del usuario
        $this->selectedRole = $user->roles->first()?->name;
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password' => 'nullable|string|min:6',
            'selectedRole' => 'required'
        ];
    }

    public function update()
    {
        $this->validate();

        $user = User::findOrFail($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;

        if (!empty($this->password)) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        // Actualizamos el rol
        $user->syncRoles([$this->selectedRole]);
        $user->updated_at = now();
        $user->save();

        session()->flash('message', 'Usuario actualizado correctamente.');
    }

    public function render()
    {
        return view('livewire.admin.users.edit')->layout('layouts.app');
    }
}
