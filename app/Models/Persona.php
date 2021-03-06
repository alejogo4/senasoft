<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $table = "tbl_persona";


    protected $fillable = ['documento',
        'tipo_documento',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'foto',
        'ficha',
        'correo_principal',
        'correo_alterno',
        'telefono',
        'otro_telefono',
        'cargo',
        'programa_formacion',
        'rh',
        'talla_camisa',
        'eps',
        'arl',
        'tipo_contrato',
        'ciudad',
        'ciudad_desplazamiento_aereo',
        'empresa',
        'tipo_alimentacion',
        'alergias',
        'enfermedades',
        'medicamento_consume',
        'arhivo_documento',
        'arhivo_certificado_eps',
        'arhivo_constancia_estudio',
        'categoria_id',
        'centro_id',
        'tipo_persona',
        'revision'];


        public function Centro() {
            return $this->hasOne(Centro::class,'id', 'centro_id');
        }

        public function Categoria() {
            return $this->hasOne(Categoria::class,'id', 'categoria_id');
        }

        public function TipoPersona() {
            return $this->hasOne(TipoPersona::class,'id', 'tipo_persona');
        }
}
