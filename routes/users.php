<?php

use App\Livewire\Admin\Users\Edit;
use App\Livewire\Admin\Users\Show;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role_redirect:Administrador'])->prefix('admin/users')->name('admin.users.')->group(function () {

    Route::get('create', function () {
        return view('admin.users.create');
    })->name('create');

    Route::get('/{user}/edit', Edit::class)->name('edit');

});

Route::middleware(['auth'])->get('/{user}', Show::class)->name('admin.users.show');

// Route::middleware(['auth'])->prefix('admin/users')->name('admin.users.')->group(function () {

//     // Solo administradores pueden crear y editar
//     Route::middleware(['role:Administrador'])->group(function () {
//         Route::get('create', function () {
//             return view('admin.users.create');
//         })->name('create');

//         Route::get('/{user}/edit', Edit::class)->name('edit');
//     });

//     // Todos los usuarios autenticados pueden ver
//     Route::get('/{user}', Show::class)->name('show');
// });
