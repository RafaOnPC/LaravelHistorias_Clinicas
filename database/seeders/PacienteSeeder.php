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
            'address' => 'Calle Principal 123',
            'phone' => '123456789'
        ]);

        Paciente::create([
            'name' => 'María',
            'surname' => 'González',
            'gender' => 'F',
            'address' => 'Avenida Central 456',
            'phone' => '987654321'
        ]);
    }
}
