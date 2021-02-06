<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    protected $primaryKey = 'id_operador';
    protected $fillable = ['nombre', 'apellido', 'telefono', 'correo', 'municipio', 'estado', 'direccion', 'estatus', 'fecha_contrato', 'num_imss', 'tipo_sangre', 'fecha_nacimiento'];
}
