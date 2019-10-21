<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuariosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personas = DB::table("tbl_persona")->get();
        foreach ($personas as $value) {
            if ($value->correo_principal != "") {
                $nombre = trim($value->nombres) . " " . trim($value->apellidos);
                User::create([
                    "documento" => $value->documento,
                    "name" => $nombre,
                    "email" => strtolower($value->correo_principal),
                    "password" => bcrypt($value->documento),
                    "rol" => $value->tipo_persona
                ]);
            }
        }
    }
}
