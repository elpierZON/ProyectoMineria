<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol = new Rol();
        $rol->nombre = 'Soporte';
        $rol->descripcion = 'Rol de soporte';
        $rol->save();

        $rol = new Rol();
        $rol->nombre = 'Empleado';
        $rol->descripcion = 'Rol de empleado';
        $rol->save();
    }
}
