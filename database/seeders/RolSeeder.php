<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Role::create(['name' => 'Administrador']);
        $profesor = Role::create(['name' => 'Profesor']);
        $director = Role::create(['name' => 'Director']);


        // Crear permisos
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'manage posts']);
        Permission::create(['name' => 'manage users']);

        // Asignar permisos a roles
        $admin->givePermissionTo(['manage categories', 'manage posts', 'manage users']);
        $profesor->givePermissionTo(['manage posts']);
        $director->givePermissionTo(['manage users']);
    }
}
