<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $adminRole = Role::create(["name"=> "administrador"]);
        $userRole = Role::create(["name"=> "usuario"]);

        // Asignar los permisos
        $adminRole->givePermissionTo('borrar libros');

    }
}
