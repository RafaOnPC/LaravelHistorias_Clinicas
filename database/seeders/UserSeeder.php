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
            "name"=> "Jill",
            "surname" => "Valentine",
            "gender" => "F",
            "speciality" => "Cardiologia",
            'phone' => '987412654',
            'cmp' => 'Solo',
            "email" => "jill@umbrella.com",
            "password" => bcrypt("12345678"),
        ])->assignRole('Administrador');

        // Crear usuario con rol de Doctor
        User::create([
            "name" => "Leon",
            "surname" => "Kennedy",
            "gender" => "M",
            "speciality" => "General",
            'phone' => '987123456',
            'cmp' => 'Solario',
            "email" => "leon@umbrella.com",
            "password" => bcrypt("12345678"),
        ])->assignRole('Doctor');

        User::create([
            'name' => 'Dr. Juan',
            'surname' => 'Pérez',
            'gender' => 'M',
            'speciality' => 'Especialidad de Juan Pérez',
            'phone' => '123456789',
            'cmp' => 'CMP de Juan Pérez',
            'email' => 'juan@example.com',
            'password' => bcrypt('password123')
        ])->assignRole('Doctor');

        User::create([
            'name' => 'Dr. María',
            'surname' => 'López',
            'gender' => 'M',
            'speciality' => 'Especialidad de María López',
            'phone' => '987654321',
            'cmp' => 'CMP de María López',
            'email' => 'maria@example.com',
            'password' => bcrypt('password123')
        ])->assignRole('Doctor');

        User::create([
            'name' => 'Dra. Ana',
            'surname' => 'Gómez',
            'gender' => 'F',
            'speciality' => 'Especialidad de Ana Gómez',
            'phone' => '456789123',
            'cmp' => 'CMP de Ana Gómez',
            'email' => 'ana@example.com',
            'password' => bcrypt('password123')
        ])->assignRole('Doctor');

        User::create([
            'name' => 'Dr. Pedro',
            'surname' => 'Rodríguez',
            'gender' => 'M',
            'speciality' => 'Especialidad de Pedro Rodríguez',
            'phone' => '987123456',
            'cmp' => 'CMP de Pedro Rodríguez',
            'email' => 'pedro@example.com',
            'password' => bcrypt('password123')
        ])->assignRole('Doctor');

    }

    
}
