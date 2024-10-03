<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar si los roles ya existen antes de crearlos
        $admin = Role::firstOrCreate(['name' => 'Administrador']);
        $profesor = Role::firstOrCreate(['name' => 'Profesor']);
        $director = Role::firstOrCreate(['name' => 'Director']);
        $usuario = Role::firstOrCreate(['name' => 'Usuario']);

        // Verificar si los permisos ya existen antes de crearlos
        $manageCategories = Permission::firstOrCreate(['name' => 'manage categories']);
        $managePosts = Permission::firstOrCreate(['name' => 'manage posts']);
        $manageTags = Permission::firstOrCreate(['name' => 'manage tags']); // Cambiar "Tags" a "tags"

        // Asignar permisos a roles, asegurando que no se dupliquen
        $admin->syncPermissions([$manageCategories, $managePosts, $manageTags]);
        $profesor->syncPermissions([$managePosts]);
        $director->syncPermissions([$manageTags]);
    }
}
