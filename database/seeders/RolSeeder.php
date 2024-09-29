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
        $Rol1 = Role::create(['name' => 'Administrador']);
        $Rol2 = Role::create(['name' => 'Profesor']);
        $Rol3 = Role::create(['name' => 'Director']);
    }
}
