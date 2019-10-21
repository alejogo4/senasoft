<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesYpermisos::class);
        $this->call(UsuariosPrimarios::class);
        $this->call(UsuariosSeeders::class);
        $this->call(CategoriaSeeder::class);
        $this->call(PorcentajeSeeder::class);
        $this->call(UsuariosSeeders::class);
    }
}
