<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $selectedUsers = [];
    public $perPage = 5;
    public $confirmingDelete = false;
    public $selectedUser;


    protected $paginationTheme = 'tailwind';


    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($userId)
    {

        // Verifica si el usuario actual tiene el rol de Administrador
        if (!auth()->user()->hasRole('Administrador')) {
            session()->flash('warning', 'No tienes permisos para eliminar usuarios.');
            return;
        }

        if (auth()->id() == $userId) {
            session()->flash('warning', 'No puedes eliminar tu propio usuario.');
            return;
        }

        $this->selectedUser = User::findOrFail($userId);
        $this->confirmingDelete = true;
    }


    // Ejecuta la eliminación definitiva
    public function deleteUser()
    {

        // Verifica nuevamente antes de ejecutar la eliminación
        if (!auth()->user()->hasRole('Administrador')) {
            session()->flash('warning', 'No tienes permisos para eliminar usuarios.');
            return;
        }

        if (auth()->id() == $userId) {
            session()->flash('warning', 'No puedes eliminar tu propio usuario.');
            return;
        }

        if ($this->selectedUser) {
            $this->selectedUser->delete();
            $this->confirmingDelete = false;
            $this->selectedUser = null;
            session()->flash('message', 'Usuario eliminado correctamente.');
        }
    }

    // Cancela la acción
    public function cancelDelete()
    {
        $this->confirmingDelete = false;
        $this->selectedUser = null;
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $search = "%{$this->search}%";

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', $search)
                    ->orWhere('email', 'like', $search)
                    ->orWhereHas('roles', function ($q2) use ($search) {
                        $q2->where('name', 'like', $search);
                    })
                    ->orWhere('created_at', 'like', $search)
                    ->orWhere('updated_at', 'like', $search);
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin.users.index',[
            'users' => $users,
            'search' => $this->search
        ]);
    }

}
