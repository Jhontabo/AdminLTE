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

        ])->assignRole('Admin');


        User::create([
            'name' => 'Jhon Tajumbina',
            'email' => 'jhonse.tajumbina@gmail.com',
            'password' => bcrypt('12345678'),

        ])->assignRole('Profesor');



        User::create([
            'name' => 'Sara Macuace',
            'email' => 'saramacuace@gmail.com',
            'password' => bcrypt('12345678'),

        ])->assignRole('Director');




        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('Usuario');
        });
    }
}
