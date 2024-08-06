<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paciente::create([
            'name' => 'Felix',
            'surname' => 'Carrasco',
            'gender' => 'M',
            'dni' => '478521365',
            'address' => 'Calle Principal 123',
            'phone' => '123456789',
            'email' => 'felix@gmail.com',
            'password' => bcrypt('felix12345')
        ]);

        Paciente::create([
            'name' => 'María',
            'surname' => 'González',
            'gender' => 'F',
            'dni' => '978521365',
            'address' => 'Avenida Central 456',
            'phone' => '987654321',
            'email' => 'maria@gmail.com',
            'password' => bcrypt('Maria12345')
        ]);
    }
}
