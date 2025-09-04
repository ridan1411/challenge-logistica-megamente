<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{

    public $name = '';
    public $email = '';
    public $password = '';
    public $roles = [];
    public $selectedRole = null;


    public function mount()
    {
        // Cargamos los roles disponibles
        $this->roles = Role::pluck('name', 'id')->toArray();
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'selectedRole' => 'required'
    ];

    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Asignamos el rol
        $user->assignRole($this->selectedRole);

        // Se emite el mensaje de éxito
        session()->flash('message', 'Usuario creado correctamente.');

        // Limpiamos formulario
        $this->reset(['name', 'email', 'password', 'selectedRole']);
    }

    public function render()
    {
        return view('livewire.admin.users.create');
    }
}
