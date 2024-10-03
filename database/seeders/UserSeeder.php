<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Jhon Tajumbina',
            'email' => 'jhonse.tajumbina@umariana.edu.co',
            'password' => bcrypt('12345678'),

        ])->assignRole('administrador');

        User::factory(10)->create();
    }
}
