<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name'=> 'Doctor']);
        //$role3 = Role::create(['name'=> 'Guest']);


        //Gestion de pacientes
        Permission::create(['name' => 'paciente.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'paciente.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'paciente.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'paciente.destroy'])->syncRoles([$role1, $role2]);

        //Gestion de doctor 
        Permission::create(['name' => 'doctor.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'doctor.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'doctor.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'doctor.destroy'])->syncRoles([$role1]);

        //Gestion de historias clinicas
        Permission::create(['name' => 'clinica.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'clinica.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'clinica.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'clinica.destroy'])->syncRoles([$role1, $role2]);

        //Invitado
        Permission::create(['name' => 'guest.index']);

    }
}
