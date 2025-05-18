<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();

        $user = new User();
        $user->name = 'Piero';
        $user->lastname = 'Mautino';
        $user->email = 'elpierZON@gmail.com';
        $user->password = bcrypt('12345678');
        $user->dni = '76321142';
        $user->id_rol = 1;
        $user->save();
    }
}
