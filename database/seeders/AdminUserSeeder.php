<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles si no existen
            $adminRole = Role::firstOrCreate(['name' => 'Administrador']);
            $guestRole = Role::firstOrCreate(['name' => 'Invitado']);

        // Crea el usuario si no existe
        $user = User::firstOrCreate(
            ['email' => 'admin@challenge.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('a123456789'),
            ]
        );

        // Si usas Spatie Roles:
            if (!$user->hasRole($adminRole)) {
                $user->assignRole($adminRole);
            }
    }
}
