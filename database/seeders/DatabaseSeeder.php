<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void

    {
        \App\Models\Post::factory(10)->create();
        \App\Models\Category::factory(5)->create();

        User::create([
            'name' => 'Jhon Tajumbina',
            'email' => 'jhonse.tajumbina@umariana.edu.co',
            'password' => Hash::make('12345678'), // Encripta la contraseña
            'role' => User::ROLE_ADMIN, // Asigna el rol de administrador
            'email_verified_at' => now(),
        ]);

        // Crear el usuario director
        User::create([
            'name' => 'Sara Macuace',
            'email' => 'sarava.macuace@umariana.edu.co',
            'password' => Hash::make('12345678'),
            'role' => User::ROLE_DIRECTOR, // Asigna el rol de editor
            'email_verified_at' => now(),
        ]);
    }
}
