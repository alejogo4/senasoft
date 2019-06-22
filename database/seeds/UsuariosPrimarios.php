<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuariosPrimarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // usuario con el rol editor
        $evaluadorProyecto = User::create([
            'name' => 'evaluadorProyecto',
            'email' => 'evaluadorProyecto@gmail.com',
            'password' => Hash::make('123456')
        ]);
        $evaluadorProyecto->assignRole('evaluadorProyecto');

        $moderador = User::create([
            'name' => 'moderador',
            'email' => 'moderador@gmail.com',
            'password' => Hash::make('123456')
        ]);

        $moderador->assignRole('moderador');

        $superAdmin1 = User::create([
            'name' => 'Alejandro Giraldo',
            'email' => 'agiraldo186@misena.edu.co',
            'password' => Hash::make('123456')
        ]);

        $superAdmin1->assignRole('super-admin');

        $superAdmin2 = User::create([
            'name' => 'Juan David Ramirez',
            'email' => 'j.deiby@misena.edu.co',
            'password' => Hash::make('123456')
        ]);

        $superAdmin2->assignRole('super-admin');

        
    }
}
